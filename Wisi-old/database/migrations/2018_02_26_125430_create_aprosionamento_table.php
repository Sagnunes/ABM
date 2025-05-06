<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAprosionamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprovisionamentos', function (Blueprint $table) {
            $table->string('id');
            $table->integer('estado')->default('0');
            $table->text('observacao')->nullable();
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
        Schema::dropIfExists('aprovisionamentos');
    }
}
