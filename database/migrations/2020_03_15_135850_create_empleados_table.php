<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{

    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('tipo_id')->unsigned();
            $table->bigInteger('dependencia_id')->unsigned();

            $table->string('nombres', 250);
            $table->string('apellidos', 250);

            $table->integer('estado');

            $table->foreign('tipo_id')
                ->references('id')
                ->on('tipos')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->foreign('dependencia_id')
                ->references('id')
                ->on('dependencias')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
