<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FamilyMemberRegistrationForm extends Form
{
    public string $cpf_nis_member = '';

    #[Validate('required')]
    public string $civil_name_member = '';

    #[Validate('required')]
    public string $relationship_member = '';

    #[Validate('required|date_format:d/m/Y')]
    public string $birth_date_member = '';

    public string $gender_member = '';

    public string $occupation_member = '';

    public string $remuneration_member = '';
}
