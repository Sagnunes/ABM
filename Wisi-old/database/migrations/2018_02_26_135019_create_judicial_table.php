<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudicialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judiciais', function (Blueprint $table) {
            $table->string('id');
            $table->string('dataInicial')->nullable();
            $table->string('dataFinal')->nullable();
            $table->string('autor');
            $table->string('reu');
            $table->string('caixa');
            $table->string('numero');
            $table->string('numeroProcesso');
            $table->string('assuntos');
            $table->text('anexo');
            $table->string('updated_user_id')->nullable();
            $table->text('observacao')->nullable();
            $table->string('freguesia_id'); //  recebe chave da tabela freguesia
            $table->string('user_id'); // recebe chave da tabela USER
            $table->string('tribunal_id'); // recebe chave da tabela tribunal
            $table->string('varaJuizo_id'); // recebe chave da tabela varaJuizo
            $table->string('classificacao_id'); // recebe chave da tabela classificacao
            $table->string('oficio_seccao_id'); // recebe chave da tabela oficioSessao
            $table->string('tipologiaJudicial_id'); // recebe chave da tabela tipologiaJudicial
            $table->string('municipio_id'); // recebe chave da tabela municipio
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
        Schema::dropIfExists('judiciais');
    }
}
