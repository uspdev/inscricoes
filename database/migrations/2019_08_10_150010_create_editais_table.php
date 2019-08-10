<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // A qual programa de pós graduação pertence esse novo período de inscrição
            $table->string('programa');

            // Período de inscrição
            $table->dateTime('inscricao_inicio');
            $table->dateTime('inscricao_fim');

            // O formuário previamente preparado que os candidatos vão de fato preencher
            $table->unsignedBigInteger('inscricao_id')->nullable();
            $table->foreign('inscricao_id')->references('id')->on('inscricoes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editais');
    }
}
