<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obitos', function (Blueprint $table) {

            $table->string('id');
            $table->string('nome');
            $table->date('data');
            $table->string('livro');
            $table->string('folha');
            $table->string('numero');
            $table->string('estadoCivil');
            $table->string('conjuge');
            $table->string('nRegisto');
            $table->string('pai');
            $table->string('mae');
            $table->text('observacao')->nullable();
            $table->string('updated_user_id')->nullable();
            $table->string('user_id'); // recebe chave da tabela USER
            $table->integer('localParoquial_id'); // recebe chave da tabela USER
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
        Schema::dropIfExists('obitos');
    }
}
