<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTypesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pet_types', function (Blueprint $table) {
            
            $table->id();
            $table->enum('species', ['Dog', 'Cat', 'Ferret', 'Birds'])->default('Dog')->nullable(false);
            // No timestamps for this table
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_types');
    }
}
