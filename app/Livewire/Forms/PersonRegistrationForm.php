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

        $person = $this->id == null ? new Person($data) : Person::query()->find($this->id)->fill($data);
        $person->save();

        /** @var Collection $membersHasAdded */
        $membersHasAdded = $this->id != null ? FamilyMember::query()->where('person_id', $this->id)->get() : collect();

        // Se existe membro da família que já foi cadastrado antes e não está mais, então remove-os
        if ($membersHasAdded->isNotEmpty()) {
            $membersHasAdded->each(function (FamilyMember $addedMember) use ($membersOfFamily) {
                if ($membersOfFamily->where('id', $addedMember->id)->isEmpty()) {
                    $addedMember->delete();
                }
            });
        }

        $membersOfFamily->each(function (FamilyMember $member) use ($person, $membersHasAdded) {
            // Faz o tratamento de conversão de datas
            if (isset($member->birth_date_member)) {
                $member->birth_date_member = Carbon::createFromFormat('d/m/Y', $member->birth_date_member)->format('Y-m-d');
            }

            /** @var ?FamilyMember $added */
            $added = $membersHasAdded->where('id', $member->id)->first();

            // Tive que fazer desse jeito, por problemas no save()...
            // Não é a melhor maneira, mas foi a mais rápida :)
            if ($added != null) {
                $added->fill(collect($member->toArray())->except(['id', 'created_at', 'updated_at', 'deleted_at'])->toArray());
                $added->save();
            } else {
                $member->person()->associate($person);
                $member->save();
            }
        });

        DB::commit();

        return $person;
    }
}
