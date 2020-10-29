<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosOpcoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos_opcoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vagas');
            $table->string('renda_ini');
            $table->string('renda_fim');
            $table->string('percentual');
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
        Schema::dropIfExists('processos_opcoes');
    }
}
