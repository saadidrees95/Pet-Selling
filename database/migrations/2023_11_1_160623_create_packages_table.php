<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2); //price in dollar
            $table->integer('credits'); // amount in rupees
            $table->timestamps();
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
