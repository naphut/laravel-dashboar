<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (Order_ID)
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to products table
            $table->foreignId('customer_type_id')->constrained()->onDelete('cascade'); // Foreign key to customer_types table
            $table->foreignId('payment_type_id')->constrained()->onDelete('cascade'); // Foreign key to payment_types table
            $table->integer('order_quantity'); // Stores the quantity of the product ordered
            $table->timestamp('order_date_time'); // Stores the date and time when the order was placed
            $table->string('order_status'); // Stores the status of the order (e.g., "pending", "shipped")
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}