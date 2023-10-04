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
        Schema::create('moradas', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->string('morada');
            $table->string('localidade');
            $table->string('codigo_postal');
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
        Schema::dropIfExists('moradas');
    }
};
