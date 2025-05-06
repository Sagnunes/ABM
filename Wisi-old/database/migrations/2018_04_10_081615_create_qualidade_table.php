<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('processo_id');
            $table->string('grupo')->nullable();
            $table->string('url');
            $table->string('titulo');
            $table->string('versao');
            $table->integer('visivel')->nullable();
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
        Schema::dropIfExists('qualidade');
    }
}
