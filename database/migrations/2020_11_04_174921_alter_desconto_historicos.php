<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDescontoHistoricos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desconto_historicos', function (Blueprint $table) {
            $table->unsignedBigInteger('analise_id')->nullable()->change();
            //$table->foreign('analise_id')->references('id')->on('analises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desconto_historicos', function (Blueprint $table) {
            //
        });
    }
}
