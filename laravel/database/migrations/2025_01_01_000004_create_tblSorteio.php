<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tblSorteio', function (Blueprint $table) {
            $table->increments('idSorteio');
            $table->dateTime('sorData')->nullable();
            $table->integer('sorIdNucleo')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblSorteio');
    }
};
