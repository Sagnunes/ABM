<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicaoLeituraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicao_leitura', function (Blueprint $table) {
            $table->increments('id');
            $table->string("requerente");
            $table->timestamp('data')->useCurrent();
            $table->integer("numero_cartao");
            $table->integer("fundo_id");
            $table->string("titulo");
            $table->string("cota");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicao_leitura');
    }
}
