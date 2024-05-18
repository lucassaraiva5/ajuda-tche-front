<?php

namespace App\Livewire;

use App\Enums\Gender;
use Canducci\Cep\CepResponse;
use Canducci\Cep\Facades\Cep;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PersonRegistration extends Component
{
    public string $name = '';
    public string $cep = '';
    public string $address = '';
    public string $number = '';
    public string $complement = '';
    public string $neighborhood = '';
    public string $uf = '';
    public string $city = '';

    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $genders = collect(Gender::cases())
            ->map(fn ($enum) => ['value' => $enum->value, 'label' => $enum->value])
            ->toArray();

        return view('livewire.person-registration', [
            'genders' => $genders
        ]);
    }

    public function save()
    {

    }
}
