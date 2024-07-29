<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pet_owner_reviews', function (Blueprint $table) {

            $table->id();
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();

            // Foreign key constraints, belongs to user as sitter, pet
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ad_id')->constrained()->onDelete('cascade');
            $table->foreignId('sitter_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_owner_reviews');
    }
};
