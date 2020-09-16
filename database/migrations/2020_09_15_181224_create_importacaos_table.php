<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('url');
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
        Schema::dropIfExists('importacaos');
    }
}
