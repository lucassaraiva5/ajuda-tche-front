<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\ExportAction;

class ListPeople extends ListRecords
{
    protected static string $resource = PersonResource::class;
}
