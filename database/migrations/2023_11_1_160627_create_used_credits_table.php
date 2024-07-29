<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('used_credits', function (Blueprint $table) {
            
            $table->id();
            $table->string('token');
            $table->integer('credit')->default(0);
            $table->timestamps();

            // Foreign key constraints, belongs to user, ad
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ad_id')->constrained()->onDelete('cascade');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('used_credits');
    }
};
