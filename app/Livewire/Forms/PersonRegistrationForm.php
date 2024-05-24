<?php

namespace App\Livewire\Forms;

use App\Models\FamilyMember;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Form;

class PersonRegistrationForm extends Form
{
    public ?int $id = null;

    public string $cpf = '';
    public string $civil_name = '';
    public string $birth_date = '';
    public string $cell_phone = '';

    public string $zip_code = '';
    public string $street = '';
    public string $number = '';

    public string $complement = '';
    public string $neighborhood = '';
    public string $state = 'RS';
    public int $city = 5005;
    public string $shelter_location = '';
    public bool $agree_true_data = false;

    public function rules(): array
    {
        return [
            'cpf' => [
                'required',
                'cpf',
                Rule::unique('people', 'cpf')->ignore($this->id),
            ],
            'civil_name' => [
                'required',
            ],
            'birth_date' => [
                'required',
                'date_format:d/m/Y',
            ],
            'street' => [
                'required',
            ],
            'number' => [
                'required'
            ],
            'neighborhood' => [
                'required',
            ],
            'state' => [
                'required',
            ],
            'city' => [
                'required',
                'int',
            ],
            'shelter_location' => [
                'required',
            ],
            'agree_true_data' => [
                'required',
            ],
        ];
    }

    /**
     * @throws ValidationException
     */
    public function store(Collection $membersOfFamily): Person
    {
        $this->validate();

        $data = $this->except(['agree_true_data']);

        DB::beginTransaction();

        $formattedDate = Carbon::createFromFormat('d/m/Y', $this->birth_date)->format('Y-m-d');
        $data['birth_date'] = $formattedDate;

        $person = $this->id == null ? new Person() : Person::query()->find($this->id)->fill($data);
        $person->save();

        /** @var Collection $familyMembersHasAdded */
        $familyMembersHasAdded = $this->id != null ? FamilyMember::query()->where('person_id', $this->id)->get() : collect();

        // Se existe membro da família que já foi cadastrado antes e não está mais, então remove-os
        if ($familyMembersHasAdded->isNotEmpty()) {
            $familyMembersHasAdded->each(function (FamilyMember $familyMember) use ($membersOfFamily) {
                if ($membersOfFamily->where('cpf_or_nis', $familyMember->cpf_or_nis)->isEmpty()) {
                    $familyMember->delete();
                }
            });
        }

        $membersOfFamily->each(function (FamilyMember $familyMember) use ($person, $familyMembersHasAdded) {
            /** @var ?FamilyMember $familyMemberHasAdded */
            $familyMemberHasAdded = $familyMembersHasAdded->where('cpf_or_nis', $familyMember->cpf_or_nis)->first();

            if (isset($familyMember->birth_date_member)) {
                $formattedDate = Carbon::createFromFormat('d/m/Y', $familyMember->birth_date_member)->format('Y-m-d');
                $familyMember->birth_date_member = $formattedDate;
            }

            // Tive que fazer desse jeito, por problemas no save()...
            // Não é a melhor maneira, mas foi a mais rápida :)
            if ($familyMemberHasAdded != null) {
                $familyMemberHasAdded->fill($familyMember->toArray());
                $familyMemberHasAdded->save();
            } else {
                $familyMember->person()->associate($person);
                $familyMember->save();
            }
        });

        DB::commit();

        return $person;
    }
}
