<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatasElaboracaoPublicadoConcluido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('processos', function (Blueprint $table) {
            $table->dateTime('data_elaborado')->nullable();
            $table->dateTime('data_publicado')->nullable();
            $table->dateTime('data_concluido')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('processos', function (Blueprint $table) {
            $table->dropColumn('data_elaborado');
            $table->dropColumn('data_publicado');
            $table->dropColumn('data_concluido');
        });
    }
}
