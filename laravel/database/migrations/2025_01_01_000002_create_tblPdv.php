<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tblPDV', function (Blueprint $table) {
            $table->increments('idPDV');
            $table->string('pdvDesignacao', 20);
            $table->string('pdvLocalFixo', 50);
            $table->integer('pdvCapacidade');
            $table->tinyInteger('pdvSuspenso');
            $table->integer('pdvIdNucleo')->nullable();
            $table->binary('pdvMotivoSuspenso')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblPDV');
    }
};