<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonResource\Pages;
use App\Http\Controllers\DefaultController;
use App\Models\Person;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static ?string $navigationIcon = 'tabler-user';

    protected static ?string $pluralLabel = 'Pessoas cadastradas';

    protected static ?string $label = 'Pessoa cadastrada';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->searchable()
                    ->sortable()
                    ->label('Realizado em'),

                TextColumn::make('civil_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nome civil'),

                TextColumn::make('social_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nome social'),

                TextColumn::make('cpf')
                    ->searchable()
                    ->sortable()
                    ->label('CPF'),

                TextColumn::make('age')
                    ->label('Idade')
                    ->sortable()
                    ->formatStateUsing(fn($state) => "$state anos"),
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Exportar para Excel')
                    ->action(function() {
                        return DefaultController::generateArray();
                    })
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeople::route('/'),
        ];
    }
}
