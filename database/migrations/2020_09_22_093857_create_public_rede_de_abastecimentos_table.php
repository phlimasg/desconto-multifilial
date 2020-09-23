<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicRedeDeAbastecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_rede_de_abastecimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('esgoto');
            $table->string('sanitaria');
            $table->string('agua');
            $table->string('energia');
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
        Schema::dropIfExists('public_rede_de_abastecimentos');
    }
}
