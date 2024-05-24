<?php

namespace App\Livewire;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class PersonIdentification extends Component
{
    public string $cpf = '';

    public string $birth_date = '';

    public function rules(): array
    {
        return [
            'cpf' => ['required', 'cpf'],
            'birth_date' => ['required', 'date_format:d/m/Y'],
        ];
    }

    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('livewire.person-identification');
    }

    /**
     * @throws ValidationException
     */
    #[On('saved')]
    public function save(string $token)
    {
        $this->validate();
        $this->validateRecaptcha($token);

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

    private function validateRecaptcha(string $token): void
    {
        // validate Google reCaptcha.
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('recaptcha.secret_key'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        /**
         * @throws ValidationException
         */
        $throw = fn ($message) => throw ValidationException::withMessages(['recaptcha' => $message]);

        if (! $response->successful() || ! $response->json('success')) {
            $throw($response->json(['error-codes'])[0] ?? 'An error occurred.');
        }

        // if response was score based (the higher the score, the more trustworthy the request)
        if ($response->json('score') < 0.6) {
            $throw('We were unable to verify that you\'re not a robot. Please try again.');
        }
    }
}
