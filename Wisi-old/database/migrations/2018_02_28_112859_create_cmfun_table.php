<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmfunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmfunchal', function (Blueprint $table) {
            $table->string('id');
            $table->date('dataInicial');
            $table->date('dataFinal');
            $table->string('cota');
            $table->string('codRef');
            $table->string('dimSuporte');
            $table->string('nivelDescricao');
            $table->integer('areaOrgFunc_id'); //recebe chave da tabela areaOrg
            $table->string('serieSubserie');
            $table->string('tituloOriginal');
            $table->string('titulo');
            $table->string('estadoConservacao');
            $table->string('ambitoConteudo');
            $table->integer('fundo_id'); //recebe chave da tabela FUNDO
            $table->text('observacao')->nullable();
            $table->string('updated_user_id')->nullable();
            $table->string('user_id'); // recebe chave da tabela USER
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
        Schema::dropIfExists('cmfunchal');
    }
}
