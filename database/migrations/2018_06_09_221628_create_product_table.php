<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('cod');
            $table->integer('cod_user')->unsigned();
            $table->integer('cod_forn')->unsigned();
            $table->string('nome');
            $table->string('tp_uni')->nullable();
            $table->double('preco');
            $table->double('preco_fornecedor');
            $table->foreign('cod_user')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cod_forn')->references('cod_forn')->on('fornecedor')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('product');
    }
}
