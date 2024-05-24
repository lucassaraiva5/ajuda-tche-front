<?php

namespace App\Livewire;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PersonIdentification extends Component
{
    #[Validate('required|cpf')]
    public string $cpf = '';


    #[Validate('required|date_format:d/m/Y')]
    public string $birth_date = '';

    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('livewire.person-identification');
    }

    public function save()
    {
        $this->validate();

        $person = Person::query()
            ->where('cpf', $this->cpf)
            ->where('birth_date', Carbon::createFromFormat('d/m/Y', $this->birth_date)->format('Y-m-d'))
            ->latest()
            ->first();

        if ($person == null) {
            return redirect()
                ->route('person-identification')
                ->with([
                    'error' => 'Nenhuma pessoa encontrada com os dados informados.',
                ]);
        }

        return redirect()->route('person-update', ['hash' => encrypt($person->id)]);
    }
}
