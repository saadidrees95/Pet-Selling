<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            
            $table->id();
            $table->enum('name', ['Super Admin', 'Admin', 'Editor', 'Pet Owner', 'Sitter'])->default('Pet Owner')->nullable(false);
            $table->enum('guard_name', ['super-admin', 'admin', 'editor', 'pet-owner', 'sitter'])->default('pet-owner')->nullable(false);
            // No timestamps for this table

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
}
