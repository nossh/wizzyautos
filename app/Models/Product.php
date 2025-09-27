<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        // Core product info
        'name',
        'slug',
        'description',
        'brand',
        'model',
        'part_number',
        'category',

        // Media
        'main_image',
        'gallery',

        // Pricing
        'price',
        'discount_price',
        'currency',

        // Inventory
        'stock_quantity',
        'is_available',
        'condition',

        // Vehicle compatibility
        'vehicle_make',
        'vehicle_model',
        'vehicle_year',

        // Extra
        'specifications',
        'is_featured',
        'is_bestseller',

        // SEO
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'specifications' => 'array',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'is_bestseller' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];


}
