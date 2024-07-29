<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            
            $table->id();
            $table->string('name', 50); // Adjust the length according to your needs
            $table->string('guard_name', 50);
            // No timestamps for this table
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
}
