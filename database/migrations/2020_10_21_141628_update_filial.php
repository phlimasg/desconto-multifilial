<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFilial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filials', function (Blueprint $table) {
            $table->string('logo_url')->after('descricao');            
            $table->string('rua')->after('descricao');
            $table->string('numero')->after('descricao');            
            $table->string('bairro')->after('descricao');
            $table->string('cidade')->after('descricao');
            $table->string('estado')->after('descricao');
            $table->string('cep')->after('descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filials', function (Blueprint $table) {
            $table->dropColumn('logo_url');
            $table->dropColumn('rua');
            $table->dropColumn('numero');
            $table->dropColumn('bairro');
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
            $table->dropColumn('cep');
            $table->dropColumn('endereco');
        });
    }
}
