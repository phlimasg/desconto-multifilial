<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reside_proximo');
            $table->string('programa_renda');
            $table->string('deficiencia');
            $table->string('irmao_nome')->nullable();
            $table->string('irmao_bolsa')->nullable();
            $table->string('renda_bruta');
            $table->string('renda_capita');
            $table->string('numero_familiares');
            $table->string('desconto_sugerido');
            $table->string('desconto_anterior')->nullable();
            $table->longText('parecer');
            $table->unsignedBigInteger('public_aluno_id');
            $table->string('user_create');
            $table->string('user_update');
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
        Schema::dropIfExists('analises');
    }
}
