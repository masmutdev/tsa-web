<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::create('upcoming_events', function (Blueprint $table) {
          $table->id();
          $table->string('image');
          $table->string('title');
          $table->text('content');
          $table->date('start_date');
          $table->date('end_date');
          $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::dropIfExists('upcoming_events');
  }
};
