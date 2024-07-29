<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            
            $table->id();
            $table->string('ref');
            $table->string('title');
            $table->date('req_date');
            $table->integer('duration');
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Foreign key constraints, belong to user, service, pet
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
}

