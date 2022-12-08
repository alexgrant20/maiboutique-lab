<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHeaders extends Migration
{
  public function up()
  {
    Schema::create('transaction_headers', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onUpdate('cascade');
      $table->integer('total_item');
      $table->integer('total_price')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('transaction_headers');
  }
}
