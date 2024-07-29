<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdResponsesTable extends Migration
{
    public function up(): void
    {
        Schema::create('ad_responses', function (Blueprint $table) {
            
            $table->id();
            $table->string('ref');
            $table->unsignedInteger('responses_count')->default(0);
            $table->string('token');
            $table->timestamps();

            // Foreign key constraints, belong to ad, user as sitter
            $table->foreignId('sitter_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_responses');
    }
}
