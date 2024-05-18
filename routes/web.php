<?php

use App\Livewire\PersonRegistration;
use App\Livewire\TermUse;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', PersonRegistration::class)
    ->name('person-registration');

Route::get('/termo', TermUse::class)->name('term-use');
