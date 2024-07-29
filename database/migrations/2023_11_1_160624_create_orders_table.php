<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            
            $table->id();
            $table->decimal('total_amount', 8, 2); // Price in dollars
            $table->integer('credits'); // Amount in credits
            $table->boolean('payment_status')->default(false); // Payment status
            $table->string('transaction_id'); // transaction id 
            $table->timestamps();

            // Foreign key constraints, belongs to user, package, 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            // $table->foreignId('discount_id')->constrained()->onDelete('cascade'); // exist in package
            // $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade'); // exist in user
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
