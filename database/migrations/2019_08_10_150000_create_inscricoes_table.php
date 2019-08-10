<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Campos obrigatórios que o candidato deve fornecer
            // Note que ele será cadastrado no sistema, assim, campos básicos devem estar
            // na tabela usuário mesmo. Ex: Nome, telefone etc
            // Referência com usuário atualmente logado
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Campos sobre graduação
            $table->string("graduacao_nome_instituicao");
            $table->string("graduacao_titulo_obtido");
            $table->date("graduacao_data_conclusao");

            // Campos sobre o projeto
            $table->text("projeto_titulo");

            // TODO: Completar...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricoes');
    }
}
