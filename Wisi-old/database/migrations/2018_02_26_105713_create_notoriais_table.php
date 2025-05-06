<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotoriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notariais', function (Blueprint $table) {
            $table->string('id');
            $table->date('data');
            $table->string('livro');
            $table->string('cotaAntiga');
            $table->string('folha');
            $table->string('outorgante');
            $table->string('objTrans');
            $table->string('outros');
            $table->text('observacao')->nullable();
            $table->string('updated_user_id')->nullable();
            $table->string('user_id'); // recebe chave da tabela USER
            $table->string('tipologiaNotario_id'); // recebe chave da tabela tipologiaNotario
            $table->string('notario_id'); // recebe chave da tabela notario
            $table->string('cartorio_id'); // recebe chave da tabela Cartorio
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
        Schema::dropIfExists('notariais');
    }
}
