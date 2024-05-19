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

    #[Validate('required')]
    public string $its_at_the_same_address = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_state = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_city = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_location = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_info = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_street = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_number = '';

    public string $shelter_complement = '';

    #[Validate('required_if:its_at_the_same_address,false')]
    public string $shelter_neighborhood = '';

    public array $immediate_needs = [];

    #[Validate('required')]
    public string $family_member_with_deficiency = '';

    #[Validate('required_if:family_member_with_deficiency,true')]
    public string $family_member_deficiency = '';

    public string $receives_BPC = '';

    public string $anyone_need_health_care = '';

    public string $who_needs_health_care = '';

    public string $anyone_take_continuous_medication = '';

    public string $who_takes_continuous_medication = '';

    public string $what_medicines_is_this_person_taking = '';


    /**
     * @throws ValidationException
     */
    public function store(): void
    {
        $this->validate();

        dd($this->all());
    }
}
