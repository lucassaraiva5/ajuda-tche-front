<?php

namespace App\Livewire;

use App\Enums\Gender;
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

    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $genders = collect(Gender::cases())
            ->map(fn($enum) => ['value' => $enum->value, 'label' => $enum->value])
            ->toArray();

        $states = State::all()
            ->map(fn($state) => ['value' => $state->uf, 'label' => $state->name])
            ->toArray();

        return view('livewire.person-registration', [
            'genders' => $genders,
            'states' => $states,
            'familyMember' => [
                [
                    'civil_name_member' => 'Maria da Silva',
                    'birth_date_member' => '1990-05-15',
                    'cpf_member' => '123.456.789-00',
                    'occupation_member' => 'Professor',
                    'remuneration_member' => 'R$ 3.500,00'
                ],
                [
                    'civil_name_member' => 'João Oliveira',
                    'birth_date_member' => '1985-08-20',
                    'cpf_member' => '987.654.321-00',
                    'occupation_member' => 'Engenheiro',
                    'remuneration_member' => 'R$ 5.200,00'
                ],
            ],
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
        $this->formFamily->storeMember();
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
