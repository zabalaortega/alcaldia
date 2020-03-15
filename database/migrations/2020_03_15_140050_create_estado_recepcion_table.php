<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoRecepcionTable extends Migration
{
    
    public function up()
    {
        Schema::create('estado_recepcion', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('estado_id')->unsigned();
            $table->bigInteger('recepcion_id')->unsigned();
            $table->text('descripcion')->nullable();

            $table->integer('estado');

            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->foreign('recepcion_id')
                ->references('id')
                ->on('recepciones')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('estado_recepcion');
    }
}
