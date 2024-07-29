<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitterExperiencesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sitter_experiences', function (Blueprint $table) {
            
            $table->id();
            $table->enum('experience', ['Less than one', 'Less than 5', 'More than 5', 'More than 10'])->default('Less than one')->nullable(false);
            // No timestamps for this table

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sitter_experiences');
    }
}

