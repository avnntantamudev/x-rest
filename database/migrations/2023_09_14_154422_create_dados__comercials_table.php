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
        Schema::create('dados__comercials', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->string('desconto');
            $table->string('tipo_preco');
            $table->string('condi_pagamento');
            $table->string('modo_pagamento');
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
        Schema::dropIfExists('dados__comercials');
    }
};
