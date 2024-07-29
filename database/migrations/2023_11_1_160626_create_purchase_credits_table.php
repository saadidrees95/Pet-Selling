<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('purchase_credits', function (Blueprint $table) {
            
            $table->id();
            $table->integer('credit')->default(0); // Adjust the precision and scale according to your needs
            $table->timestamps();

            // Foreign key constraints, belongs to user as sitter, order
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_credits');
    }
};

