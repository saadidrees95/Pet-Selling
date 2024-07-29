<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            
            $table->id();
            $table->string('country', 50);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->string('post_code', 20);
            $table->string('street', 255);
            $table->timestamps();
            
            // Foreign key constraints, belong to user
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
}
