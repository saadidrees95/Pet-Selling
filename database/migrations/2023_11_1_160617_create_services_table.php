<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->longText('long_description');
            $table->timestamps();
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
}

