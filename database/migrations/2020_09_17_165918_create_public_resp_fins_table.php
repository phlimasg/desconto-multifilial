<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicRespFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_resp_fins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resp_vinculo');
            $table->string('nome');
            $table->string('estado_civil');
            $table->string('nacionalidade');
            $table->string('naturalidade');            
            $table->string('escolaridade');
            $table->string('profissao');
            $table->string('dt_nasc');
            $table->string('email');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('telefone')->nullable();
            $table->string('celular');
            $table->string('cpf');
            $table->string('rg');
            $table->string('orgao_emissor');
            $table->string('dt_emissor');
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
        Schema::dropIfExists('public_resp_fins');
    }
}
