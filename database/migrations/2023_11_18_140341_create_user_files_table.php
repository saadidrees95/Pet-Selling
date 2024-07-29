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
        Schema::create('user_files', function (Blueprint $table) {

            $table->id();
            $table->enum('image_type', ['sitter_files', 'petowner_files']);
            $table->string('title', 255);
            $table->text('image_path');
            $table->timestamps();

            // Foreign key constraints, belong to user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_files');
    }
};

