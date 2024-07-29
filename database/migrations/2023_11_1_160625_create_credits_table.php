<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{

    public function up(): void
    {
        Schema::create('credits', function (Blueprint $table) {
            
            $table->id();
            $table->integer('balance')->default(0); // Balance of connects for the user
            $table->timestamps();

            // Foreign key constraints, belongs to user as sitter
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
}
