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
        $table->string('user_id')->unique();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('photo')->nullable();
        $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
        $table->enum('level', ['Admin', 'User'])->default('User');
        $table->enum('role', ['Full', 'Member', 'Guest'])->default('Guest');
        $table->rememberToken()->nullable();
        $table->string('verify_token')->nullable();
        $table->timestamp('last_activity')->nullable();
        $table->timestamps();
    });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
