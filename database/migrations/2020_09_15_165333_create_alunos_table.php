<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ra');
            $table->string('cpf')->nullable();
            $table->string('nome_aluno')->nullable();
            $table->string('sexo')->nullable();
            $table->string('ano')->nullable();
            $table->string('turma')->nullable();
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cep')->nullable();
            $table->string('turno_aluno')->nullable();
            $table->string('respacad')->nullable();
            $table->string('respacadcpf')->nullable();
            $table->string('respacademail')->nullable();
            $table->string('respacadtel1')->nullable();
            $table->string('respacadtel2')->nullable();
            $table->string('respacaddtnascimento')->nullable();
            $table->string('respfin')->nullable();
            $table->string('respfincpf')->nullable();
            $table->string('respfinemail')->nullable();
            $table->string('respfintel1')->nullable();
            $table->string('respfincel')->nullable();
            $table->string('respfindtnascimento')->nullable();
            $table->string('pai')->nullable();
            $table->string('paidtnasc')->nullable();
            $table->string('paicpf')->nullable();
            $table->string('paitel')->nullable();
            $table->string('mae')->nullable();
            $table->string('maedtnasc')->nullable();
            $table->string('maecpf')->nullable();
            $table->string('maetel')->nullable();
            $table->bigInteger('importacao_id')->nullable();
            $table->unsignedBigInteger('processo_id');
            $table->foreign('processo_id')->references('id')->on('processos')->onDelete('cascade');
            $table->string('user_create');
            $table->string('user_update');
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
        Schema::dropIfExists('alunos');
    }
}
