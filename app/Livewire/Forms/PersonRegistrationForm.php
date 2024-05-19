<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonRegistrationForm extends Form
{
    #[Validate('required|cpf|unique:people,cpf')]
    public string $cpf = '';

    #[Validate('required')]
    public string $civil_name = '';

    public string $social_name = '';

    #[Validate('required')]
    public string $mother_name = '';

    #[Validate('required|boolean')]
    public string $has_cadastro_unico = '';

    #[Validate('required_if:has_cadastro_unico,true')]
    public string $nis_number = '';

    #[Validate('required|boolean')]
    public string $has_bolsa_familia = '';

    #[Validate('required|boolean')]
    public string $covered_by_the_program_volta_por_cima = '';

    #[Validate('required|boolean')]
    public string $access_to_social_kitchen = '';

    public string $social_kitchen = '';

    #[Validate('required|boolean')]
    public string $handicapped = '';

    public string $zip_code = '';

    #[Validate('required')]
    public string $street = '';

    #[Validate('required')]
    public string $number = '';

    public string $complement = '';

    #[Validate('required')]
    public string $neighborhood = '';

    #[Validate('required')]
    public string $state = '';

    #[Validate('required')]
    public string $city = '';

    public string $shelter_state = '';

    public string $shelter_city = '';

    public string $shelter_location = '';

    public string $shelter_info = '';

    public string $shelter_street = '';

    public string $shelter_number = '';

    public string $shelter_complement = '';

    public string $shelter_neighborhood = '';

    /**
     * @throws ValidationException
     */
    public function store(): void
    {
        $this->validate();

        dd($this->all());
    }
}
