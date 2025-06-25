
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('properties', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('agent_id'); // بدل foreignId مباشرة
    $table->string('title');
    $table->text('description');
    $table->decimal('price', 10, 2); // تحديد الدقة
    $table->string('location');
    $table->enum('status', ['available', 'sold'])->default('available');
    $table->timestamps();

    $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
});
