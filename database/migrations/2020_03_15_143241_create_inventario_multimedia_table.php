<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioMultimediaTable extends Migration
{
    
    public function up()
    {
        Schema::create('inventario_multimedia', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('inventario_id')->unsigned();
            $table->bigInteger('multimedia_id')->unsigned();
            $table->text('descripcion')->nullable();

            $table->integer('estado');

            $table->foreign('inventario_id')
                ->references('id')
                ->on('inventarios')
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
        Schema::dropIfExists('inventario_multimedia');
    }
}
