<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key for the settings table
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Optional foreign key to the users table, linking settings to a user; deletes settings if user is deleted
            $table->string('key'); // Stores the setting key (e.g., "theme", "notifications")
            $table->string('value'); // Stores the setting value (e.g., "dark", "on")
            $table->timestamps(); // Adds created_at and updated_at columns to track when the setting was created and last updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings'); // Drops the settings table if it exists during rollback
    }
}