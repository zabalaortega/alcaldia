<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('multimedia_id')->unsigned();
            $table->text('descripcion')->nullable();

            $table->integer('estado');

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->foreign('multimedia_id')
                ->references('id')
                ->on('multimedias')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
