<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tblNucleo', function (Blueprint $table) {
            $table->increments('idNucleo');
            $table->string('nucRazaoSocial', 70)->nullable();
            $table->string('nucFantasia', 45)->nullable();
            $table->char('nucIE', 16)->nullable();
            $table->char('nucCNPJ', 16)->nullable();
            $table->string('nucEndereco', 45)->nullable();
            $table->char('nucNumero', 5)->nullable();
            $table->integer('nucCep')->nullable();
            $table->char('nucTelefone', 12)->nullable();
            $table->string('nucEmail', 45)->nullable();
            $table->tinyInteger('nucSuspenso')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblNucleo');
    }
};
