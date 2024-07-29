<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdViewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('ad_views', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedInteger('views_count')->default(0); // Add an index to the views_count column
            $table->timestamps();

            // Foreign key constraints, belong to ad, user as sitter
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade');
    
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_views');
    }
}

