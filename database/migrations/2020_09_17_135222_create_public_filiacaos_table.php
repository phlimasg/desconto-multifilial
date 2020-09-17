<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicFiliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_filiacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mae_nome');
            $table->string('mae_cpf');
            $table->string('mae_rg');
            $table->string('mae_dt_nasc');
            $table->string('mae_telefone');
            $table->string('mae_tipo_guarda');            
            $table->string('pai_nome')->nullable();
            $table->string('pai_cpf')->nullable();
            $table->string('pai_rg')->nullable();
            $table->string('pai_dt_nasc')->nullable();
            $table->string('pai_telefone')->nullable();
            $table->string('pai_tipo_guarda')->nullable();
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
        Schema::dropIfExists('public_filiacaos');
    }
}
