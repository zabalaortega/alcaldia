<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediasTable extends Migration
{

    public function up()
    {
        Schema::create('multimedias', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre_multimedia', 150);
            $table->string('tipo', 150);
            $table->string('serial', 100)->unique()->nullable();
            
            $table->integer('estado');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('multimedias');
    }
}
