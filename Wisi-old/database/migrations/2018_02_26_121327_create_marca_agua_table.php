<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcaAguaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_aguas', function (Blueprint $table) {
            $table->string('id');
            $table->string('tema');
            $table->string('subTema');
            $table->string('cota');
            $table->string('resumo');
            $table->integer('fundo_id');
            $table->date('data');
            $table->string('folio');
            $table->string('descricao');
            $table->integer('updated_user_id');
            $table->string('imagem')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('marca_agua');
    }
}
