<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;


class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_image')->circular(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('brand')->sortable(),
                TextColumn::make('category')->sortable(),
                TextColumn::make('price')->money('CFD')->sortable(),
                TextColumn::make('stock_quantity')->sortable(),
                IconColumn::make('is_available')->boolean(),
                IconColumn::make('is_featured')->boolean(),
                IconColumn::make('is_bestseller')->boolean(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')->options([
                    'engine' => 'Engine',
                    'tire' => 'Tire',
                    'brake' => 'Brake',
                    'battery' => 'Battery',
                    'accessory' => 'Accessory',
                ]),
                TernaryFilter::make('is_available')->boolean(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
