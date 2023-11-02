<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::create('finance', function (Blueprint $table) {
          $table->id();
          $table->string('needs_income')->nullable();
          $table->string('needs_spend')->nullable();
          $table->decimal('price_income', 10, 2)->nullable();
          $table->decimal('price_spend', 10, 2)->nullable();
          $table->string('description')->nullable();
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::dropIfExists('finance');
  }
};
