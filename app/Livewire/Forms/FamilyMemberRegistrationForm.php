<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FamilyMemberRegistrationForm extends Form
{
    #[Validate('required|cpf|unique:people,cpf')]
    public string $cpf_member = '';

    #[Validate('required')]
    public string $civil_name_member = '';

    public string $social_name_member = '';

    #[Validate('required')]
    public string $mother_name_member = '';

    #[Validate('required|date')]
    public string $birth_date_member = '';

    #[Validate('required')]
    public string $gender_member = '';

    #[Validate('required')]
    public string $occupation_member = '';

    #[Validate('required')]
    public string $remuneration_member = '';

    public function storeMember(): void
    {
        dd($this->all());
    }
}
