<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area'); // in square meters
            $table->boolean('furnished')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('property_details');
    }
};
