<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->string('nome');
            $table->string('url');
            $table->string('descricao');
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
        Schema::dropIfExists('filials');
    }
}
