<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionesTable extends Migration
{
    
    public function up()
    {
        Schema::create('recepciones', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('equipo_id')->unsigned();

            $table->date('fecha_entrada');
            $table->date('fecha_salida')->nullable();
            $table->text('descripcion')->nullable();

            $table->foreign('equipo_id')
            ->references('id')
            ->on('equipos')
            ->onDelete('RESTRICT')
            ->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('recepciones');
    }
}
