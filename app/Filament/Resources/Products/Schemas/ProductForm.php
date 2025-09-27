<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;


class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('brand'),
                TextInput::make('model'),
                TextInput::make('part_number'),
                Select::make('category')
                    ->options([
                        'engine' => 'Engine',
                        'tire' => 'Tire',
                        'brake' => 'Brake',
                        'battery' => 'Battery',
                        'accessory' => 'Accessory',
                    ])
                    ->searchable(),

                FileUpload::make('main_image')
                    ->image()
                    ->directory('products')
                    ->disk('public'), // 👈 ensures public URLs

                FileUpload::make('gallery')
                    ->image()
                    ->multiple()
                    ->directory('products/gallery')
                    ->disk('public'), // 👈 ensures public URLs

                TextInput::make('price')
                    ->numeric()
                    ->required(),

                TextInput::make('discount_price')
                    ->numeric()
                    ->nullable(),

                TextInput::make('currency')
                    ->default('USD'),

                TextInput::make('stock_quantity')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_available')->default(true),
                Select::make('condition')
                    ->options([
                        'new' => 'New',
                        'used' => 'Used',
                        'refurbished' => 'Refurbished',
                    ])
                    ->default('new'),

                TextInput::make('vehicle_make'),
                TextInput::make('vehicle_model'),
                TextInput::make('vehicle_year'),

                Repeater::make('specifications')
                    ->schema([
                        TextInput::make('key'),
                        TextInput::make('value'),
                    ])
                    ->columns(2),

                Toggle::make('is_featured'),
                Toggle::make('is_bestseller'),

                TextInput::make('meta_title'),
                Textarea::make('meta_description'),
            ]);
    }
}
