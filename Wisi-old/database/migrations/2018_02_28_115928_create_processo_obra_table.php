<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessoObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_obras', function (Blueprint $table) {
            $table->string('id');
            $table->integer('entidade_id');
            $table->string('objeto');
            $table->string('concelho');
            $table->integer('freguesia_id');
            $table->string('sitio');
            $table->string('localizacao');
            $table->string('tipo_obra');
            $table->string('data');
            $table->string('volume');
            $table->string('cota');
            $table->string('numero_documento');
            $table->string('numero_projeto');
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
        Schema::dropIfExists('processo_obras');
    }
}
