<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicSituacaoHabitacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_situacao_habitacionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_habitacao');
            $table->string('tipo_habitacao_comodos');
            $table->string('tipo_moradia');
            $table->string('tipo_residencia');
            $table->string('tempo_moradia');
            $table->string('outras_moradias');
            $table->string('outras_moradias_vinculo');
            $table->string('cad_unico');
            $table->unsignedBigInteger('public_resp_fin_id');
            $table->foreign('public_resp_fin_id')->references('id')->on('public_resp_fins')->onDelete('cascade');
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
        Schema::dropIfExists('public_situacao_habitacionals');
    }
}
