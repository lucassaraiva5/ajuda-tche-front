<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function unitStorage(): BelongsTo
    {
        return $this->belongsTo(UnitStorage::class);
    }

    public function unitTypes(): BelongsToMany
    {
        return $this->belongsToMany(UnitType::class, 'product_unit_types');
    }

    public function unitConversions(): BelongsToMany
    {
        return $this->belongsToMany(UnitConversion::class, 'product_unit_conversions');
    }
}
