<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (Payment_Type_ID)
            $table->string('payment_type_description'); // Stores the description of the payment type (e.g., "Credit Card", "PayPal")
            $table->timestamps(); // Adds created_at and updated_at columns to track when the payment type was created and last updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_types'); // Drops the payment_types table if it exists during rollback
    }
}