<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->string('apellidos', 150);

            $table->bigInteger('tipo_id')->unsigned();
            $table->bigInteger('dependencia_id')->unsigned();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('estado');

            $table->foreign('tipo_id')
                ->references('id')
                ->on('tipos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE'); 

            $table->foreign('dependencia_id')
                ->references('id')
                ->on('dependencias')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
