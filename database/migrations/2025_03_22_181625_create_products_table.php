<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (Product_ID)
            $table->string('product_name'); // Stores the name of the product
            $table->decimal('product_price', 10, 2); // Stores the price of the product (e.g., 29.99)
            $table->integer('product_quantity_stock'); // Stores the available stock quantity of the product
            $table->string('product_status'); // Stores the status of the product (e.g., "active", "inactive")
            $table->text('product_description')->nullable(); // Stores the description of the product (optional)
            $table->timestamps(); // Adds created_at and updated_at columns to track when the product was created and last updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); // Drops the products table if it exists during rollback
    }
}