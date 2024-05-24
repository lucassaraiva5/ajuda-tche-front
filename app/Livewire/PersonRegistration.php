<?php

namespace App\Livewire;

use App\Enums\Gender;
use App\Enums\Relation;
use App\Livewire\Forms\FamilyMemberRegistrationForm;
use App\Livewire\Forms\PersonRegistrationForm;
use App\Models\City;
use App\Models\FamilyMember;
use App\Models\Person;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PersonRegistration extends Component
{
    public PersonRegistrationForm $form;
    public FamilyMemberRegistrationForm $formFamily;

    public bool $addingFamilyMember = false;

    public int $familyMemberIndexMobileCard = 0;

    public array $familyMembers = [];

    public array $cities = [];

    public function mount(): void
    {
        if (request()->has('hash')) {
            $record = Person::query()->find(decrypt(request()->get('hash')));

            $this->form->fill($record->toArray());
            $this->form->birth_date = Carbon::createFromFormat('Y-m-d', $record->birth_date)->format('d/m/Y');

            $this->familyMembers = $record->familyMembers
                ->map(function ($familyMember) {
                    $familyMember->birth_date_member = Carbon::createFromFormat('Y-m-d', $familyMember->birth_date_member)->format('d/m/Y');

                    return $familyMember;
                })
                ->toArray();
        } else {
            $this->redirect(route('home'));
        }
    }

    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $genders = collect(Gender::cases())
            ->map(fn($enum) => ['value' => $enum->value, 'label' => $enum->value])
            ->toArray();

        $relationships = collect(Relation::cases())
            ->map(fn($enum) => ['value' => $enum->value, 'label' => $enum->value])
            ->toArray();

        $states = State::all()
            ->map(fn($state) => ['value' => $state->uf, 'label' => $state->name])
            ->toArray();

        return view('livewire.person-registration', [
            'genders' => $genders,
            'relationships' => $relationships,
            'states' => $states,
            'cities' => $this->cities
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function addFormFamily(): void
    {
        $this->formFamily->validate();
        $this->familyMembers[] = $this->formFamily->toArray();

        $this->closeFamilyMemberForm();
    }

    /**
     * @throws ValidationException
     */
    public function save()
    {
       $person = $this->form->store(
            collect($this->familyMembers)
                ->map(fn($familyMember) => new FamilyMember($familyMember))
        );

        return redirect()
            ->route('user-registered', ['hash' => encrypt($person->id)]);
    }

    public function openFamilyMemberForm(): void
    {
        $this->addingFamilyMember = true;
    }

    public function closeFamilyMemberForm(): void
    {
        $this->formFamily->reset();

        $this->addingFamilyMember = false;
    }

    public function nextFamilyMemberIndexMobileCard(): void
    {
        $this->familyMemberIndexMobileCard = max($this->familyMemberIndexMobileCard++, count($this->familyMembers) - 1);
    }

    public function previousFamilyMemberIndexMobileCard(): void
    {
        $this->familyMemberIndexMobileCard = min($this->familyMemberIndexMobileCard--, 0);
    }

    public function hasFamilyMembers(): bool
    {
        return count($this->familyMembers) > 0;
    }

    public function removeFamilyMember($index): void
    {
        Arr::forget($this->familyMembers, $index);

        // Realiza um reindex no array
        $this->familyMembers = array_values($this->familyMembers);
    }

    public function getStatesToSelectBox()
    {
         // Defina a chave do cache utilizando o estado como parte da chave
        $cacheKey = 'cities_for_state_' . $this->form->state;

        // Cache o resultado da consulta
        return Cache::remember($cacheKey, 86400, function () {
            return City::whereStateUf($this->form->state)
                ->get()
                ->map(fn($city) => ['value' => $city->id, 'label' => $city->name])
                ->toArray();
        });
    }
}
