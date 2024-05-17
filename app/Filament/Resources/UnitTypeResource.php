<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitTypeResource\Pages;
use App\Filament\Resources\UnitTypeResource\RelationManagers;
use App\Models\UnitType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitTypeResource extends Resource
{
    protected static ?string $model = UnitType::class;

    protected static ?string $navigationIcon = 'tabler-box';

    protected static ?string $navigationGroup = 'Cadastros';

    protected static ?string $label = 'tipo de unidade';

    protected static ?string $pluralLabel = 'Tipos de unidades';

    protected static bool $hasTitleCaseModelLabel = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormSchema())
            ->columns(1);
    }

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('description')
                ->label('Descrição')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('value')
                ->label('Valor')
                ->required()
                ->numeric(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Deletado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Valor')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton(),
                Tables\Actions\DeleteAction::make()
                    ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUnitTypes::route('/'),
        ];
    }
}
