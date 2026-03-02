<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tblFornecedor', function (Blueprint $table) {
            $table->increments('idFornecedor');
            $table->string('forRazSocial', 60);
            $table->char('forCnpj', 15);
            $table->integer('forCep');
            $table->char('forTelefone', 15);
            $table->string('forContato', 50)->nullable();
            $table->char('forNumero', 15)->nullable();
            $table->string('forComplemento', 20)->nullable();
            $table->string('forIe', 15)->nullable();
            $table->tinyText('forCelular')->nullable();
            $table->tinyInteger('forSuspenso')->nullable();
            $table->binary('forSusMotivo')->nullable();
            $table->integer('forIdNucleo')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblFornecedor');
    }
};
