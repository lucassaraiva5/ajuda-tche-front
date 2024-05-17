<?php

namespace App\Filament\Resources\HelpPlaceResource\Pages;

use App\Filament\Resources\HelpPlaceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHelpPlaces extends ManageRecords
{
    protected static string $resource = HelpPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
