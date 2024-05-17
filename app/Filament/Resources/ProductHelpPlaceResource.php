<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductHelpPlaceResource\Pages;
use App\Filament\Resources\ProductHelpPlaceResource\RelationManagers;
use App\Models\HelpPlace;
use App\Models\Product;
use App\Models\ProductHelpPlace;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductHelpPlaceResource extends Resource
{
    protected static ?string $model = ProductHelpPlace::class;

    protected static ?string $navigationIcon = 'tabler-shopping-bag';

    protected static ?string $label = 'estoque posto';

    protected static ?string $pluralLabel = 'Estoques posto';

    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $navigationGroup = 'Cadastros';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->options(Product::all()->pluck('description', 'id'))
                    ->live()
                    ->required(),
                Forms\Components\Select::make('help_place_id')
                    ->options(HelpPlace::all()->pluck('description', 'id'))
                    ->required(),
                Forms\Components\Select::make('unit_type_id')
                    ->options(function (Forms\Get $get) {
                        $productId = $get('product_id');

                        if ($productId == null)
                            return [];

                        return Product::query()
                            ->find($productId)
                            ->unitTypes()
                            ->with(['unitType'])
                            ->get()
                            ->pluck('unitType.description', 'unitType.id');
                    })
                    ->required(),
                Forms\Components\Select::make('unit_conversion_id')
                    ->options(function (Forms\Get $get) {
                        $productId = $get('product_id');

                        if ($productId == null)
                            return [];

                        return Product::query()
                            ->find($productId)
                            ->unitConversions()
                            ->with(['unitConversion'])
                            ->get()
                            ->pluck('unitConversion.description', 'unitConversion.id');
                    })
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('amount')
                    ->label('Quantidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.description')
                    ->label('Produto')
                    ->sortable(),
                Tables\Columns\TextColumn::make('helpPlace.description')
                    ->label('Posto de ajuda')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListProductHelpPlaces::route('/'),
            'create' => Pages\CreateProductHelpPlace::route('/create'),
        ];
    }
}
