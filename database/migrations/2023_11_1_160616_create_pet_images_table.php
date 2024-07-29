<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetImagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pet_images', function (Blueprint $table) {
            
            $table->id();
            $table->enum('image_type', ['profile_image', 'gallery_image'])->default('profile_image');
            $table->string('title', 255);
            $table->text('image_path');
            $table->timestamps();

            // Foreign key constraints, belong to pet
            $table->foreignId('pet_id')->constrained()->onDelete('cascade');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_images');
    }
}
