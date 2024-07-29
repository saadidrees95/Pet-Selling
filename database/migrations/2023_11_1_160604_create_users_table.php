<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            // Login Info
            $table->string('username');
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->boolean('active')->default(true); // user status

            //Profile Info
            $table->string('first_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('mobile')->nullable();
            $table->timestamp('mobile_verified_at')->nullable()->default(null);
            $table->string('insurance_number')->nullable()->default(null);
            $table->text('about', 500)->nullable();
            $table->timestamps();

            // Foreign key constraints, belong to role 
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
