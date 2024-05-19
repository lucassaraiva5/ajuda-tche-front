<?php

use App\Livewire\LandingPage;
use App\Livewire\PersonRegistration;
use App\Livewire\Team;
use App\Livewire\TermUse;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class)
    ->name('landing-page');

Route::get('/time', Team::class)
    ->name('team');

Route::get('/cadastro', PersonRegistration::class)
    ->name('person-registration');

Route::get('/termo', TermUse::class)->name('term-use');
