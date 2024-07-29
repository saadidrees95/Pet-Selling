<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('breed')->nullable()->default('Unknown');
            $table->string('behavior', 255)->nullable()->default('Friendly with kids and cat');
            // $table->boolean('vaccinated')->default(false);
            $table->boolean('status')->default(true);
            $table->text('about', 500)->nullable();
            $table->timestamps();

            // Foreign key constraints, belong to user, species, age, size, medication
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('pet_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('pet_size_id')->constrained()->onDelete('cascade');
            $table->foreignId('pet_age_id')->constrained()->onDelete('cascade');
            $table->foreignId('pet_medication_id')->constrained()->onDelete('cascade');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
}

