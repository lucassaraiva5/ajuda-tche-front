<?php

namespace App\Livewire;

use App\Enums\Gender;
use App\Enums\Relation;
use App\Livewire\Forms\FamilyMemberRegistrationForm;
use App\Livewire\Forms\PersonRegistrationForm;
use App\Models\FamilyMember;
use App\Models\Person;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserRegistered extends Component
{
    public ?string $protocol = '';

    public function mount(): void
    {
        $hash = request()->get('hash');

        $person = Person::query()->find(decrypt($hash));
        $this->protocol = $person?->protocol;
    }

    #[Layout('layouts.app')]
    public function render(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('livewire.user-registered');
    }
}
