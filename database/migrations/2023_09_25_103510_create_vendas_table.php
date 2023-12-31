<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 'valor_entregue',
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->integer('preco_total');
            $table->integer('troco')->nullable();
            $table->integer('valor_entregue')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('nome_cliente');
            $table->string('contribuente');
            $table->string('cod_documento')->nullable();
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
        Schema::dropIfExists('vendas');
    }
};
