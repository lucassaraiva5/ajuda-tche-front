<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\UnitConversion;
use App\Models\UnitStorage;
use App\Models\UnitType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'tabler-shopping-bag-edit';

    protected static ?string $label = 'tipo de produto';

    protected static ?string $pluralLabel = 'Tipos de produtos';

    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $navigationGroup = 'Cadastros';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->label('Descrição')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('unit_storage_id')
                    ->label('Unidade de armazenamento')
                    ->live()
                    ->options(UnitStorage::all()->pluck('description', 'id'))
                    ->required()
                    ->afterStateUpdated(function (Forms\Set $set) {
                        $set('unitConversions', []);
                    }),

                Forms\Components\Select::make('unitTypes')
                    ->label('Tipos de unidades')
                    ->relationship(titleAttribute: 'description')
                    ->createOptionForm(UnitTypeResource::getFormSchema())
                    ->multiple()
                    ->searchable(false)
                    ->options(UnitType::all()->pluck('description', 'id'))
                    ->required(),

                Forms\Components\Select::make('unitConversions')
                    ->preload()
                    ->label('Conversões de unidades')
                    ->relationship(titleAttribute: 'description')
                    ->live()
                    ->multiple()
                    ->searchable(false)
                    ->options(function (Forms\Get $get) {
                        $unitStorageId = $get('unit_storage_id');

                        if ($unitStorageId === null) {
                            return [];
                        }

                        return UnitConversion::query()
                            ->where('unit_storage_id', $unitStorageId)
                            ->get()
                            ->pluck('description', 'id');
                    })
                    ->required()
            ]);
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
                Tables\Columns\TextColumn::make('unitStorage.description')
                    ->label('Unidade de armazenamento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('unitTypes.description')
                    ->label('Tipos de unidades')
                    ->sortable(),
                Tables\Columns\TextColumn::make('unitConversions.description')
                    ->label('Conversões de unidades')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
