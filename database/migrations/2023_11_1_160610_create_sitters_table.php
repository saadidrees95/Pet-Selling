<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSittersTable extends Migration
{
    public function up(): void
    {
        Schema::create('sitters', function (Blueprint $table) {
            
            $table->id();
            $table->enum('sit_type', ['Pet Sitter', 'House Sitter', 'Combine'])->default('Pet Sitter');
            $table->decimal('rate', 8, 2)->default(0.00);
            $table->boolean('availability')->default(true); // user status
            $table->enum('charging_mode', ['Hourly', 'Daily'])->default('Hourly');
            // $table->string('title');
            $table->timestamps();

            // Foreign key constraints , belong to user, species, sitter_experience
            $table->foreignId('sitter_experience_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('pet_type_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

    
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sitters');
    }
}
