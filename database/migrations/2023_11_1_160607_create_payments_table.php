<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            
            $table->id();
            $table->string('method', 50); 
            $table->string('account_no', 20);
            $table->string('title');
            $table->date('expiry_date');
            $table->unsignedSmallInteger('cvc');
            $table->timestamps();

            // Foreign key constraints, belong to user
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
}
