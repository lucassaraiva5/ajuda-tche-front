<?php

namespace App\Livewire;

use App\Enums\Gender;
use App\Enums\Relation;
use App\Livewire\Forms\FamilyMemberRegistrationForm;
use App\Livewire\Forms\PersonRegistrationForm;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PersonRegistration extends Component
{
    public PersonRegistrationForm $form;
    public FamilyMemberRegistrationForm $formFamily;

    public $count = 0;

    public $familyMembers = [];

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
            'familyMember' => $this->familyMembers,
            'count' => $this->count
        ]);
    }

    public function save(): RedirectResponse
    {
        $this->form->store();

        $this->dispatch('personSaved');

        return redirect()->back()->with('success', 'Seu cadastro foi enviado com sucesso!');
    }

    public function saveMember()
    {
        $this->formFamily->storeMember($this->familyMembers);
    }

    public function next()
    {
        $this->count++;
    }

    public function previus()
    {
        $this->count--;
    }
}
