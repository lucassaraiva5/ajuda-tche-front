<?php

namespace App\Livewire;

use App\Enums\Gender;
use App\Enums\Relation;
use App\Livewire\Forms\FamilyMemberRegistrationForm;
use App\Livewire\Forms\PersonRegistrationForm;
use App\Models\FamilyMember;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
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

    public function save()
    {
        $this->form->store(
            collect($this->familyMembers)
                ->map(fn($familyMember) => new FamilyMember($familyMember))
        );

        return redirect()
            ->route('home')
            ->with('success', 'Seu cadastro foi enviado com sucesso!');
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
    }
}
