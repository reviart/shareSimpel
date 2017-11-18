<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('matakuliahs', function (Blueprint $table) {
          $table->string('kode_mk')->primary();
          $table->string('nama_mk');
          $table->integer('sks');
          $table->string('seksi');
          $table->string('dosen');
          $table->time('lecture_started');
          $table->time('lecture_finished');
          $table->unsignedInteger('user_id');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
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
