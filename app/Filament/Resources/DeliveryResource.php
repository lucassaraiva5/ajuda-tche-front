<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryResource\Pages;
use App\Filament\Resources\DeliveryResource\RelationManagers;
use App\Models\Delivery;
use App\Models\Driver;
use App\Models\HelpPlace;
use App\Models\Product;
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
                Forms\Components\TextInput::make('description')
                    ->label('Descrição')
                    ->required()
                    ->maxLength(300),
                Forms\Components\Select::make('help_place_destination_id')
                    ->label('Posto Ajuda Destino')
                    ->options(HelpPlace::all()->pluck('description', 'id')),
                Forms\Components\Select::make('driver_id')
                    ->label('Motorista')
                    ->options(Driver::all()->pluck('name', 'id')),

                Forms\Components\Repeater::make('productDeliveries')
                    ->relationship()
                    ->label('Entregas de Produtos')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->label('Produto')
                            ->live()
                            ->options(Product::all()->pluck('description', 'id'))
                            ->required(),
                        Forms\Components\Select::make('unit_type_id')
                            ->options(function (Forms\Get $get) {
                                $productId = $get('product_id');
        
                                if ($productId == null)
                                    return [];
                          
                                return Product::find($productId)
                                    ->unitTypes()
                                    ->get()
                                    ->filter(function ($unitType) {
                                        return $unitType->description !== null;
                                    })
                                    ->pluck('description', 'id')
                                    ->toArray();
                            })
                            ->required(),

                        Forms\Components\Select::make('unit_conversion_id')
                            ->options(function (Forms\Get $get) {
                                $productId = $get('product_id');
        
                                if ($productId == null)
                                    return [];
        
                                return Product::find($productId)
                                    ->unitConversions()
                                    ->get()
                                    ->filter(function ($unitConversion) {
                                        return $unitConversion->description !== null;
                                    })
                                    ->pluck('description', 'id')
                                    ->toArray();
                            }),

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
