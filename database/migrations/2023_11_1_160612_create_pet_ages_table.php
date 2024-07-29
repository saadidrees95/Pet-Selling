<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetAgesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pet_ages', function (Blueprint $table) {
            
            $table->id();
            $table->string('age'); // Add an index to the age column
            $table->enum('age', ['Puppies (1< year)', 'Young (1-3 years)', 'Adult (3-8 years)', 'Senior (8 + years)'])->default('Young (1-3 years)')->nullable(false);
            // No timestamps for this table
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_ages');
    }
}

