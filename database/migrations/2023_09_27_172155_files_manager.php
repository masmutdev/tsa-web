<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::create('files_manager', function (Blueprint $table) {
          $table->id();
          $table->string('user_id');
          $table->string('file_name');
          $table->text('file_description');
          $table->text('file_data');
          $table->text('format');
          $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
          $table->enum('visibility', ['Member', 'Shared'])->default('Shared');
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::dropIfExists('files_manager');
  }
};
