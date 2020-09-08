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

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('multimedia_id')->unsigned();

            $table->text('descripcion');
            $table->date('fecha_salida')->nullable();
            $table->time('hora_salida')->nullable();


            $table->integer('estado');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('multimedia_id')
                ->references('id')
                ->on('multimedias')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
