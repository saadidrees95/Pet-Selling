<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('how_to_find_us');
            $table->text('message');
            $table->timestamps();
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};