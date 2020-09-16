<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFilialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_filials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_create');
            $table->string('user_update');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('filial_id')->references('id')->on('filials')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
        Schema::dropIfExists('user_filials');
    }
}
