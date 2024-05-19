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

    #[Validate('required|date')]
    public string $birth_date = '';

    #[Validate('required')]
    public string $gender = '';

    #[Validate('required')]
    public string $occupation = '';

    #[Validate('required')]
    public string $remuneration = '';

    #[Validate('required|regex:/^\(\d{2}\) \d{1} \d{4}-\d{4}$/')]
    public string $cell_phone = '';

    #[Validate('required|email|unique:people,email')]
    public string $email = '';

    #[Validate('required|in:true,false')]
    public string $has_unique_registration = '';

    #[Validate('required_if:has_unique_registration,true')]
    public string $nis_number = '';

    #[Validate('required|in:true,false')]
    public string $bolsa_familia_beneficiary = '';

    #[Validate('required|in:true,false')]
    public string $volta_por_cima_beneficiary = '';

    #[Validate('required|in:true,false')]
    public string $city_beneficiary = '';

    #[Validate('required|in:true,false')]
    public string $access_social_kitchen = '';

    public string $which_social_kitchen = '';

    #[Validate('required|in:true,false')]
    public string $has_disability = '';

    public string $disability_type = '';

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

    #[Validate('required|in:true,false')]
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
public string $disabled_family_member = '';

    #[Validate('required_if:disabled_family_member,true')]
    public string $family_member_disability_type = '';

    #[Validate('required|in:true,false')]
    public string $receives_bpc = '';

    #[Validate('required|in:true,false')]
    public string $needs_healthcare = '';

    public string $who_needs_health_care = '';

    #[Validate('required|in:true,false')]
    public string $uses_continuous_medication = '';

    public string $who_uses_continuous_medication = '';

    public string $which_continuous_medications = '';

    #[Validate('required')]
    public string $housing_status = '';

    public string $others_housing_status = '';

    /**
     * @throws ValidationException
     */
    public function store(): void
    {
        $this->validate();

        dd($this->all());
    }
}
