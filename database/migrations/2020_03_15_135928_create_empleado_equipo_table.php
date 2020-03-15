<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoEquipoTable extends Migration
{
    
    public function up()
    {
        Schema::create('empleado_equipo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('equipo_id')->unsigned();
            $table->text('descripcion')->nullable();

            $table->integer('estado');

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

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
        Schema::dropIfExists('empleado_equipo');
    }
}
