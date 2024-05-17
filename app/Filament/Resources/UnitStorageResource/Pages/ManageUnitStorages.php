<?php

namespace App\Filament\Resources\UnitStorageResource\Pages;

use App\Filament\Resources\UnitStorageResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Enums\MaxWidth;

class ManageUnitStorages extends ManageRecords
{
    protected static string $resource = UnitStorageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth(MaxWidth::Medium),
        ];
    }
}
