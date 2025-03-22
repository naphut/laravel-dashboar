<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_types', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (Customer_Type_ID)
            $table->string('customer_type_description'); // Stores the description of the customer type (e.g., "Regular", "VIP")
            $table->timestamps(); // Adds created_at and updated_at columns to track when the customer type was created and last updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_types'); // Drops the customer_types table if it exists during rollback
    }
}