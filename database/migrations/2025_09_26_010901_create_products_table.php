<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // 🔑 Core product info
            $table->string('name');                         // e.g. "Toyota Corolla Engine"
            $table->string('slug')->unique();               // SEO-friendly URL
            $table->text('description')->nullable();        // Full description
            $table->string('brand')->nullable();            // e.g. Toyota, Honda
            $table->string('model')->nullable();            // e.g. Corolla 2015
            $table->string('part_number')->nullable();      // Manufacturer part number
            $table->string('category')->nullable();         // e.g. Engine, Tire, Brake

            // 🖼 Media
            $table->string('main_image')->nullable();       // Main product image
            $table->json('gallery')->nullable();            // Multiple images

            // 💰 Pricing
            $table->decimal('price', 10, 2);                // Selling price
            $table->decimal('discount_price', 10, 2)->nullable(); // Optional discount price
            $table->string('currency', 10)->default('CFD'); // Currency

            // 📦 Inventory
            $table->integer('stock_quantity')->default(0);  // How many available
            $table->boolean('is_available')->default(true); // In stock / Out of stock
            $table->string('condition')->default('new');    // new, used, refurbished

            // 🚗 Vehicle compatibility (optional but useful)
            $table->string('vehicle_make')->nullable();     // Toyota, Honda, BMW
            $table->string('vehicle_model')->nullable();    // Corolla, Civic
            $table->string('vehicle_year')->nullable();     // 2015, 2020

            // ⚙️ Extra fields
            $table->json('specifications')->nullable();     // Size, weight, color, etc.
            $table->boolean('is_featured')->default(false); // Show on homepage
            $table->boolean('is_bestseller')->default(false); // Bestseller flag

            // 🔍 SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();

        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
