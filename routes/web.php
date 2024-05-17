<?php

use App\Livewire\PersonRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', PersonRegistration::class)
    ->name('person-registration');
