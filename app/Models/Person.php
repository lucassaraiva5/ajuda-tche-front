<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'has_unique_registration' => 'boolean',
        'bolsa_familia_beneficiary' => 'boolean',
        'volta_por_cima_beneficiary' => 'boolean',
        'city_beneficiary' => 'boolean',
        'access_social_kitchen' => 'boolean',
        'has_disability' => 'boolean',
        'its_at_the_same_address' => 'boolean',
        'receives_bpc' => 'boolean',
        'needs_healthcare' => 'boolean',
        'uses_continuous_medication' => 'boolean',
    ];
}
