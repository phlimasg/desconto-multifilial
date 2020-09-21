<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicComposicaoFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_composicao_familiars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('parentesco');
            $table->string('idade');
            $table->string('estado_civil');
            $table->string('escolaridade');            
            $table->string('profissao');
            $table->string('salario');
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
        Schema::dropIfExists('public_composicao_familiars');
    }
}
