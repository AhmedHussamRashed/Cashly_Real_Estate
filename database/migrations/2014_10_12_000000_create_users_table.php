<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // إضافة عمود 'role' إلى جدول المستخدمين
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // يمكن أن يكون: admin، agent، user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف عمود 'role' في حالة التراجع عن الهجرة
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        Schema::dropIfExists('users');
    }
};
