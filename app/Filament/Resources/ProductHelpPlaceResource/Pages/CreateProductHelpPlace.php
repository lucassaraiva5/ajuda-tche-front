<?php

namespace App\Filament\Resources\ProductHelpPlaceResource\Pages;

use App\Filament\Resources\ProductHelpPlaceResource;
use App\Filament\Resources\UnitConversionResource;
use App\Models\ProductHelpPlace;
use App\Models\UnitConversion;
use App\Models\UnitType;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Filament\Support\Facades\FilamentView;
use Illuminate\Database\Eloquent\Model;
use function Filament\Support\is_app_url;

class CreateProductHelpPlace extends CreateRecord
{
    protected static string $resource = ProductHelpPlaceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data = parent::mutateFormDataBeforeCreate($data);

        $unitType = UnitType::query()->find($data['unit_type_id']);
        $unitConversion = UnitConversion::query()->find($data['unit_conversion_id']);

        $data['amount'] *= $unitType->value * $unitConversion->value;

        unset($data['unit_type_id']);
        unset($data['unit_conversion_id']);

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $record = new ($this->getModel())($data);

        //Confere se já existe um assim
        $another = ProductHelpPlace::query()
            ->where('product_id', $data['product_id'])
            ->where('help_place_id', $data['help_place_id'])
            ->limit(1)
            ->first();

        if ($another !== null) {
            $another->amount += $data['amount'];

            $record = $another;
        }

        $record->save();

        return $record;
    }
}
