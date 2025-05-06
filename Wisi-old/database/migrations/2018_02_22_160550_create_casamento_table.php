<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casamentos', function (Blueprint $table) {
            $table->string('id');
            $table->string('data');
            $table->integer('nRegisto');
            $table->string('livro');
            $table->string('folha');
            $table->string('numero');
            $table->string('marido');
            $table->string('mulher');
            $table->string('maeMarido');
            $table->string('paiMarido');
            $table->string('maeMulher');
            $table->string('paiMulher');
            $table->text('observacao')->nullable();
            $table->string('updated_user_id')->nullable();
            $table->string('user_id'); // recebe chave da tabela USER
            $table->string('localParoquial_id'); // recebe chave da tabela conservatoriaParoquial
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
        Schema::dropIfExists('casamentos');
    }
}
