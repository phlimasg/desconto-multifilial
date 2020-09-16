<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->dateTime('periodo_ini');
            $table->dateTime('periodo_fim');
            $table->string('url');
            $table->string('user_create');
            $table->string('user_update');
            $table->unsignedBigInteger('filial_id');
            $table->foreign('filial_id')->references('id')->on('filials')->onDelete('cascade');
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
        Schema::dropIfExists('processos');
    }
}
