<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicaoAutorizacaoCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicao_autorizacao', function (Blueprint $table) {
            $table->string('id');
            $table->string('requerente');
            $table->string('morada');
            $table->string('telefone');
            $table->string('email');
            $table->string('numero_cartao_identificacao');
            $table->string('tipo_cartao_identificacao');
            $table->timestamp('data')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicao_autorizacao');
    }
}
