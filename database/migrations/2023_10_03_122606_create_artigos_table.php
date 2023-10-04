<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_familia');
            $table->string('artigo');
            $table->string('descricao');
            $table->string('unidade_base');
            $table->integer('pvp1');
            $table->integer('pvp2')->nullable();
            $table->integer('pvp3')->nullable();
            $table->integer('pvp4')->nullable();
            $table->integer('pvp5')->null();
            $table->string('movimenta_conta');
            $table->string('componente');
            $table->string('cod_barra')->nullable();

            $table->timestamps();

            $table->foreign('id_familia')->references('id')->on('familia_artigos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigos');
    }
};
