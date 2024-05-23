<?php

namespace App\Livewire\Forms;

use App\Models\FamilyMember;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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

    public string $mother_name = '';

    #[Validate('required|date_format:d/m/Y')]
    public string $birth_date = '';
    public string $gender = '';
    public string $occupation = '';
    public string $remuneration = '';
    public string $cell_phone = '';
    public string $email = '';
    public ?bool $has_unique_registration = null;
    public string $nis_number = '';
    public ?bool $bolsa_familia_beneficiary = null;
    public ?bool $volta_por_cima_beneficiary = null;
    public ?bool $city_beneficiary = null;
    public ?bool $access_social_kitchen = null;

    public string $which_social_kitchen = '';
    public ?bool $has_disability = null;

    public string $disability_type = '';

    public string $zip_code = '';

    #[Validate('required')]
    public string $street = '';

    #[Validate('required')]
    public string $number = '';

    public string $complement = '';
    public string $neighborhood = '';

    public string $state = 'RS';

    #[Validate('required')]
    public int $city = 5005;

    public ?bool $its_at_the_same_address = null;
    public string $shelter_state = '';
    public string $shelter_city = '';
    public string $shelter_location = '';
    public string $shelter_info = '';
    public string $shelter_street = '';
    public string $shelter_number = '';

    public string $shelter_complement = '';
    public string $shelter_neighborhood = '';

    public string $declared_situation = '';

    public array $immediate_needs = [];
    public ?bool $disabled_family_member = null;
    public string $family_member_disability_type = '';
    public ?bool $receives_bpc = null;
    public ?bool $needs_healthcare = null;

    public string $who_needs_healthcare = '';
    public ?bool $uses_continuous_medication = null;

    public string $who_uses_continuous_medication = '';

    public string $which_continuous_medications = '';
    public array $housing_status = [];

    public string $others_housing_status = '';

    /**
     * @throws ValidationException
     */
    public function store(Collection $membersOfFamily): void
    {
        $this->validate();
        $data = $this->all();
        $data['immediate_needs'] = implode(',', $data['immediate_needs'] ?? []);
        $data['housing_status'] = implode(',', $data['housing_status'] ?? []);
        DB::beginTransaction();


        $formattedDate = Carbon::createFromFormat('d/m/Y', $this->birth_date)->format('Y-m-d');
        $data['birth_date'] = $formattedDate;

        $person = new Person($data);
        $person->save();

        $membersOfFamily->each(function (FamilyMember $familyMember) use ($person) {
            if (isset($familyMember->birth_date_member)) {
                $formattedDate = Carbon::createFromFormat('d/m/Y', $familyMember->birth_date_member)->format('Y-m-d');
                $familyMember->birth_date_member = $formattedDate;
            }

            $familyMember->person()->associate($person);
            $familyMember->save();
        });

        DB::commit();
    }
}
