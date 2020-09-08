<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
           
            $table->bigIncrements('id');

            $table->string('nombre_proceso');
            $table->text('descripcion')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('procesos');
    }
}
