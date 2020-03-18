<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('descripcion')->nullable();
            $table->integer('stock');
            $table->integer('existencia')->nullable();

            $table->integer('estado');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
