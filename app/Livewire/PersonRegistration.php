<?php

namespace App\Livewire;

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
        return view('livewire.person-registration');
    }

    public function searchByCep(): void
    {
        if (str($this->cep)->trim()->isNotEmpty()) {
            /** @var CepResponse $cep */
            $cep = Cep::find($this->cep);

            if ($cep->getCepModel() !== null) {
                $this->address = $cep->getCepModel()->getLogradouro();
                $this->neighborhood = $cep->getCepModel()->getBairro();
                $this->uf = $cep->getCepModel()->getUf();
                $this->city = $cep->getCepModel()->getLocalidade();
            }
        }
    }

    public function save()
    {

    }
}
