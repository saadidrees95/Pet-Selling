<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserImagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_images', function (Blueprint $table) {
            
            $table->id();
            $table->enum('image_type', ['profile_image', 'gallery_image'])->default('profile_image');
            $table->string('title', 255);
            $table->text('image_path');
            $table->timestamps();

            // Foreign key constraints, belong to user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_images');
    }
}