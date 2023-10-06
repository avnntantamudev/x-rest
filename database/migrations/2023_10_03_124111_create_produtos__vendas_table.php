<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 'venda_id',
        'artigo',
        'preco',
        'quantidade',
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos__vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_id');
            $table->string('artigo');
            $table->string('descricao');
            $table->string('cod_documento');
            $table->integer('preco');
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos__vendas');
    }
};
