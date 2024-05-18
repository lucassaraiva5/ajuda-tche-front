<?php

namespace App\Filament\Resources\DeliveryResource\Pages;

use App\Filament\Resources\DeliveryResource;
use App\Models\Delivery;
use App\Models\UnitConversion;
use App\Models\UnitType;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateDelivery extends CreateRecord
{
    protected static string $resource = DeliveryResource::class;
}
