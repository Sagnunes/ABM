<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNascimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nascimentos', function (Blueprint $table) {
            $table->string('id');
            $table->string('data');
            $table->integer('nRegisto');
            $table->string('livro');
            $table->string('filho');
            $table->string('pai');
            $table->string('folha');
            $table->string('mae');
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
        Schema::dropIfExists('nascimentos');
    }
}
