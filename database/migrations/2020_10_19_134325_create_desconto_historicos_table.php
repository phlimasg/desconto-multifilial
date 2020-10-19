<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescontoHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desconto_historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('percentual');
            $table->string('user_create');
            $table->unsignedBigInteger('analise_id');
            $table->unsignedBigInteger('public_aluno_id');
            $table->unsignedBigInteger('processo_id');
            $table->foreign('analise_id')->references('id')->on('analises')->onDelete('cascade');
            $table->foreign('public_aluno_id')->references('id')->on('public_alunos')->onDelete('cascade');
            $table->foreign('processo_id')->references('id')->on('processos')->onDelete('cascade');
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
        Schema::dropIfExists('desconto_historicos');
    }
}
