<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileReferenceToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id'); // recebe a chave da tabela user
            $table->string('categoria_profissional')->nullable();
            $table->integer('telefone')->nullable();
            $table->string('morada')->nullable();
            $table->integer('servico_id')->nullable();
            $table->string('extensao_telefonica');
            $table->string('gabinete');
            $table->string('mecanografico')->nullable();
            $table->string('cartao_acesso')->nullable();
            $table->string('cdp')->nullable();
            $table->string('imagem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
