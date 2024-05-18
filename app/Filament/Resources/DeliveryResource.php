<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryResource\Pages;
use App\Filament\Resources\DeliveryResource\RelationManagers;
use App\Models\Delivery;
use App\Models\Driver;
use App\Models\HelpPlace;
use App\Models\Product;
use App\Models\UnitConversion;
use App\Models\UnitType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryResource extends Resource
{
    protected static ?string $model = Delivery::class;

    protected static ?string $navigationIcon = 'tabler-truck-delivery';

    protected static ?string $label = 'entrega';

    protected static ?string $pluralLabel = 'Entregas';

    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $navigationGroup = 'Cadastros';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('description')
                        ->label('Descrição')
                        ->required()
                        ->maxLength(300),
                    Forms\Components\Select::make('help_place_destination_id')
                        ->searchable()
                        ->label('Posto de ajuda (DESTINO)')
                        ->options(HelpPlace::all()->pluck('description', 'id')),
                    Forms\Components\Select::make('driver_id')
                        ->label('Motorista')
                        ->searchable()
                        ->options(Driver::all()->pluck('name', 'id')),
                ])
                    ->columns(3)
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('products')
                    ->columnSpanFull()
                    ->relationship('products')
                    ->mutateRelationshipDataBeforeCreateUsing(function ($data) {
                        $unitType = UnitType::query()->find($data['unit_type_id']);
                        $unitConversion = UnitConversion::query()->find($data['unit_conversion_id']);

                        $data['amount'] *= $unitType->value * $unitConversion->value;

                        data_forget($data, 'unit_type_id');
                        data_forget($data, 'unit_conversion_id');

                        return $data;
                    })
                    ->label('Produtos')
                    ->columns(7)
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->label('Produto')
                            ->live()
                            ->searchable()
                            ->columnSpan(2)
                            ->options(Product::all()->pluck('description', 'id'))
                            ->required(),
                        Forms\Components\Select::make('unit_type_id')
                            ->label('Tipo de unidade')
                            ->columnSpan(2)
                            ->searchable()
                            ->preload()
                            ->options(function (Forms\Get $get) {
                                $productId = $get('product_id');

                                if ($productId == null)
                                    return [];

                                return Product::query()
                                    ->find($productId)
                                    ->unitTypes()
                                    ->get()
                                    ->pluck('description', 'id');
                            })
                            ->required(),

                        Forms\Components\Select::make('unit_conversion_id')
                            ->label('Unidade de conversão')
                            ->columnSpan(2)
                            ->searchable()
                            ->preload()
                            ->options(function (Forms\Get $get) {
                                $productId = $get('product_id');

                                if ($productId == null)
                                    return [];

                                return Product::query()
                                    ->find($productId)
                                    ->unitConversions()
                                    ->get()
                                    ->pluck('description', 'id');
                            })
                            ->required(),

                        Forms\Components\TextInput::make('amount')
                            ->label('Quantidade')
                            ->required()
                            ->numeric(),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDeliveries::route('/'),
            'create' => Pages\CreateDelivery::route('/create'),
            'edit' => Pages\EditDelivery::route('/{record}/edit'),
        ];
    }
}
