<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFornecedor extends Migration
{
    /**
     * Run the migr
     ations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->increments('cod_forn');
            $table->integer('user_id')->unsigned();
            $table->string('nome');
            $table->string('endereço')->nullable();
            $table->string('telefone')->nullable();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
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
        //
    }
}
