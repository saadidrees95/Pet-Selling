<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetSizesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pet_sizes', function (Blueprint $table) {
            
            $table->id();
            $table->string('size'); // Add an index to the size column
            $table->enum('size', ['Extra Small', 'Small', 'Medium', 'Large', 'Giant'])->default('Medium')->nullable(false);
            // No timestamps for this table
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_sizes');
    }
}
