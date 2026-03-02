<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('name', 255)->nullable();
            $table->string('usuLogin', 15);
            $table->string('password', 255)->nullable();
            $table->tinyInteger('usuSuspenso');
            $table->char('usuCPF', 12)->nullable();
            $table->string('email', 255)->nullable();
            $table->integer('usuIdRec')->nullable();
            $table->integer('usuIdNucleo')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
