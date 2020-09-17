<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ra');
            $table->string('serie');
            $table->string('escolaridade');
            $table->string('nome');
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->string('sexo');
            $table->string('dt_nasc');
            $table->string('email')->nullable();
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('telefone')->nullable();
            $table->string('cpf');
            $table->string('rg');
            $table->string('orgao_emissor');
            $table->string('dt_emissor');
            $table->string('esc_origem');
            $table->string('esc_origem_tipo');
            $table->string('esc_origem_desconto')->nullable();
            $table->string('reside_proximo');
            $table->string('transp_utilizado');
            $table->string('deficiencia');
            $table->string('deficiencia_tipo')->nullable();
            $table->string('irmao')->nullable();
            $table->string('irmao_ra')->nullable();
            $table->unsignedBigInteger('processo_id');
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
        Schema::dropIfExists('public_alunos');
    }
}
