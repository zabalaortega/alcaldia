<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoProcesoTable extends Migration
{

    public function up()
    {
        Schema::create('prestamo_proceso', function (Blueprint $table) {
           
            $table->bigIncrements('id');

            $table->bigInteger('proceso_id')->unsigned();
            $table->bigInteger('prestamo_id')->unsigned();
            $table->text('descripcion')->nullable();

            $table->integer('estado');

            $table->foreign('proceso_id')
                ->references('id')
                ->on('procesos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('prestamo_id')
                ->references('id')
                ->on('prestamos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamo_proceso');
    }
}
