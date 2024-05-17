<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductUnitType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function unitType(): BelongsTo
    {
        return $this->belongsTo(UnitType::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
