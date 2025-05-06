<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositos', function (Blueprint $table) {
            $table->string('id');
            $table->string('titulo');
            $table->string('cotaI');
            $table->string('cotaF');
            $table->string('totalUI');
            $table->string('D');
            $table->string('B');
            $table->string('E');
            $table->string('P');
            $table->string('nRegisto');
            $table->integer('fundo_id');
            $table->integer('estado')->default(1);
            $table->date('dataDevolucao');
            $table->text('observacao')->nullable();
            $table->string('user_id'); // recebe chave da tabela USER
            $table->integer('fantasma_id')->nullabe(); // recebe chave da tabela FANTASMA
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
        Schema::dropIfExists('depositos');
    }
}
