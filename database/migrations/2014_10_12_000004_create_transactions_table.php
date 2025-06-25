<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->constrained()->onDelete('cascade');
            $table->date('transaction_date');
            $table->decimal('total_price', 12, 2);
            $table->string('payment_method')->nullable(); // Stripe, PayPal, etc.
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};
