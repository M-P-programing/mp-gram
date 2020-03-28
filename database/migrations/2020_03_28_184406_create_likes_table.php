<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('likes', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id')
        ->unsigned();
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('CASCADE');
      $table->bigInteger('image_id')
        ->unsigned();
      $table->foreign('image_id')
        ->references('id')
        ->on('images')
        ->onDelete('CASCADE');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('likes');
  }
}
