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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate')->unique();
            $table->enum('type', ['passenger', 'cargo']);
            $table->enum('status', ['available', 'in_use', 'maintenance']);
            $table->float('fuel_consumption');
            $table->string('pool');
            $table->date('service_schedule')->nullable();
            $table->date('last_service_date')->nullable();
            $table->boolean('is_rented');
            $table->string('rental_company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
