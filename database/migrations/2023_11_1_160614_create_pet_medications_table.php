<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetMedicationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('pet_medications', function (Blueprint $table) {
            
            $table->id();
            $table->enum('medication', ['Medication1', 'Medication2', 'Medication3', 'Medication4', 'Medication5'])->default('Medium')->nullable(false);
            // No timestamps for this table
       
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_medications');
    }
}
