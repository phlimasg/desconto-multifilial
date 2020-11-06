<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagemUsuáriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->text('msg_usuario');
            $table->unsignedBigInteger('public_aluno_id');
            $table->string('user_create');
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
        Schema::dropIfExists('mensagem_usuarios');
    }
}
