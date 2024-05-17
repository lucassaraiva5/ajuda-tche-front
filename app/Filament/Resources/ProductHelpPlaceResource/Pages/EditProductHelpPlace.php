<?php

namespace App\Filament\Resources\ProductHelpPlaceResource\Pages;

use App\Filament\Resources\ProductHelpPlaceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductHelpPlace extends EditRecord
{
    protected static string $resource = ProductHelpPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
