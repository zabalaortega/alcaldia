<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposTable extends Migration
{
    
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre_tipo', 150);
            $table->text('descripcion')->nullable();
            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}
