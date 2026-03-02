<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tblProdutos', function (Blueprint $table) {
            $table->increments('idProduto');
            $table->string('proItem', 60);
            $table->string('proDescriao', 100);
            $table->decimal('proPrecoCusto', 12, 2);
            $table->decimal('proPrecoVenda', 12, 2);
            $table->decimal('proLucro', 12, 2);
            $table->decimal('proSaldoAtual', 15, 3);
            $table->integer('proPacote');
            $table->integer('proMultiplicador');
            $table->integer('proCodAutomacao');
            $table->decimal('proSaldoMinimo', 15, 3);
            $table->integer('proLucroP')->nullable();
            $table->integer('proAtalho')->nullable();
            $table->char('proAtalhoLabel', 15)->nullable();
            $table->decimal('proPrecoVendedor', 12, 2)->nullable();
            $table->decimal('proLucroPVendedor', 12, 2)->nullable();
            $table->tinyInteger('proPacoteCheck')->nullable();
            $table->integer('proIdNucleo')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tblProdutos');
    }
};
