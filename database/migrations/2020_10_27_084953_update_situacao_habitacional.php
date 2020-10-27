<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSituacaoHabitacional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_situacao_habitacionals', function (Blueprint $table) {
            //condicao_moradia
            $table->string('condicao_moradia')->after('tipo_residencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_situacao_habitacionals', function (Blueprint $table) {
            $table->dropColumn('condicao_moradia');
        });
    }
}
