<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMsgUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensagem_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('processo_id')->after('public_aluno_id');
            $table->foreign('processo_id')->references('id')->on('processos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensagem_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('processo_id');
        });
    }
}
