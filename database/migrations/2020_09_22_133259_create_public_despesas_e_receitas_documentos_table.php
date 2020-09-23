<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicDespesasEReceitasDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_d_e_r_documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('nome_novo');
            $table->string('url');
            $table->unsignedBigInteger('despesas_e_receita_id');
            $table->foreign('despesas_e_receita_id')->references('id')->on('public_despesas_e_receitas')->onDelete('cascade');
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
        Schema::dropIfExists('public_despesas_e_receitas_documentos');
    }
}
