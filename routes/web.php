<?php

use App\Http\Middleware\DisabledSession;
use App\Livewire\LandingPage;
use App\Livewire\PersonRegistration;
use App\Livewire\Team;
use App\Livewire\TermUse;
use App\Livewire\UserRegistered;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portal');
})
    ->name('home');

// Route::get('/cadastro', LandingPage::class)
//     ->name('landing-page');

Route::get('/time', Team::class)
    ->name('team');

Route::get('/cadastrar', PersonRegistration::class)
    ->name('person-registration');

Route::get('/sucesso', UserRegistered::class)
    ->name('user-registered');

Route::get('/termo', TermUse::class)->name('term-use');
