<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('files', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('ext');
          $table->string('size');
          $table->enum('status', ['edited', 'not_edited']);
          $table->string('user_nim');
          $table->string('kode_mk');
          $table->timestamps();

          $table->foreign('user_nim')->references('nim')->on('users');
          $table->foreign('kode_mk')->references('kode_mk')->on('matakuliahs');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
