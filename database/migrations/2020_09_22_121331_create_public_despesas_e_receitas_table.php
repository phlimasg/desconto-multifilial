<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicDespesasEReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_despesas_e_receitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo');
            $table->string('descricao');
            $table->string('valor');
            $table->string('observacao');
            $table->unsignedBigInteger('public_aluno_id');
            $table->foreign('public_aluno_id')->references('id')->on('public_alunos')->onDelete('cascade');
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
        Schema::dropIfExists('public_despesas_e_receitas');
    }
}
