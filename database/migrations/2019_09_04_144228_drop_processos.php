<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropProcessos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('processos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codcur');
            $table->string('titulo');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('niveis');
            $table->string('status');
            $table->dateTime('data_elaborado')->nullable();
            $table->dateTime('data_publicado')->nullable();
            $table->dateTime('data_concluido')->nullable();
            $table->timestamps();
        });
    }
}
