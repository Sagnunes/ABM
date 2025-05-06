<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financas', function (Blueprint $table) {
            $table->string('id');
            $table->string('tipo');
            $table->date('dataInicial');
            $table->date('dataFinal');
            $table->date('data');
            $table->string('concelho');
            $table->string('entidade');
            $table->string('nome');
            $table->string('morada');
            $table->string('estadoCivil');
            $table->integer('freguesia_id'); //recebe chave da tabela freguesia
            $table->string('descricao')->nullable();
            $table->integer('user_id')-> unsigned();//recebe chave da tabela user
            $table->string('updated_user_id')->nullable();
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
        Schema::dropIfExists('financas');
    }
}
