<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaLiberadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ra_liberados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ra');
            $table->string('user_create');
            $table->unsignedBigInteger('processo_id');
            $table->foreign('processo_id')->references('id')->on('processos')->onDelete('cascade'); 
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
        Schema::dropIfExists('ra_liberados');
    }
}
