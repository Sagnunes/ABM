<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassaporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passaportes', function (Blueprint $table) {
            $table->string('id');
            $table->string('mes');
            $table->string('ano');
            $table->string('numeroCaixa');
            $table->string('folha');
            $table->string('numeroProcesso');
            $table->string('numeroPassaporte');
            $table->string('requerente');
            $table->string('bi');
            $table->string('requerentePai')->nullable();
            $table->string('requerenteMae')->nullable();
            $table->string('idade')->nullable();
            $table->date('dataBatismoNascimento')->nullable();
            $table->string('conjuge')->nullable();
            $table->string('conjugePai')->nullable();
            $table->string('conjugeMae')->nullable();
            $table->string('observacao')->nullable();
            $table->string('updated_user_id')->nullable();
            $table->string('destino_id'); // recebe chave da tabela DESTINO
            $table->string('naturalidade_id'); // recebe chave da tabela NATURALIDADE
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
        Schema::dropIfExists('passaportes');
    }
}
