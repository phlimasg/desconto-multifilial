<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');                    
            $table->string('veiculo_fabricante');
            $table->string('veiculo_ano');
            $table->string('veiculo_modelo');
            $table->string('veiculo_placa')->nullable();
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
        Schema::dropIfExists('public_veiculos');
    }
}
