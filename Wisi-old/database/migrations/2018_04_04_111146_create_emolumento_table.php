<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmolumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emolumentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->string('requerente');
            $table->string('teorDocumento');
            $table->string('nProcesso');
            $table->string('livro');
            $table->string('cota');
            $table->string('registo');
            $table->string('folha');
            $table->string('ano');
            $table->string('pagamento');
            $table->string('valor');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('emolumentos');
    }
}
