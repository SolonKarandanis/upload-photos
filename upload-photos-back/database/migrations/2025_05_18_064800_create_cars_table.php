<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maker_id')->constrained('makers');
            $table->foreignId('model_id')->constrained('car_models');
            $table->integer('year');
            $table->integer('price');
            $table->integer('mileage');
            $table->string('vin',255);
            $table->foreignId('car_type_id')->constrained('car_types');
            $table->foreignId('fuel_type_id')->constrained('fuel_types');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('city_id')->constrained('cities');
            $table->string('phone',255)->nullable();
            $table->string('address',255)->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
