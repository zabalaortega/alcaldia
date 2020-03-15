<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciasTable extends Migration
{
    
    public function up()
    {
        Schema::create('dependencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('nombre_dependencia', 150);
            $table->text('descripcion')->nullable();
            
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dependencias');
    }
}
