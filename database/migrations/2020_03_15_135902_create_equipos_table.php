<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('serial', 100)->unique();
            $table->string('marca', 100);
            $table->string('tipo', 100);

            $table->integer('estado');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
