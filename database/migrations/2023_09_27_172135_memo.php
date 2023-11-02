<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::create('memo', function (Blueprint $table) {
          $table->id();
          $table->string('user_id');
          $table->string('title');
          $table->text('content');
          $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
          $table->enum('visibility', ['Member', 'Shared'])->default('Shared');
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::dropIfExists('memo');
  }
};
