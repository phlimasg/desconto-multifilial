<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePublicAlunosDesconto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_alunos', function (Blueprint $table) {
            $table->string('desconto_deferido')->after('irmao_ra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_alunos', function (Blueprint $table) {
            $table->dropColumn('desconto_deferido');
        });
    }
}
