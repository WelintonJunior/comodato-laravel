<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tblVendedores', function (Blueprint $table) {
            $table->increments('idVendedor');
            $table->string('venNome', 70);
            $table->string('venCpf', 20)->nullable();
            $table->string('venRg', 10)->nullable();
            $table->string('venInss', 10)->nullable();
            $table->string('venPrefeitura', 10)->nullable();
            $table->string('venPis', 20)->nullable();
            $table->string('venCelular', 15)->nullable();
            $table->string('venEndereco', 80)->nullable();
            $table->string('venNumero', 7)->nullable();
            $table->string('venBairro', 50)->nullable();
            $table->string('venCidade', 50)->nullable();
            $table->string('venUf', 2)->nullable();
            $table->string('venCep', 10)->nullable();
            $table->date('venDtNasc')->nullable();
            $table->tinyInteger('venEstadoCivil')->default(0);
            $table->string('venConjuge', 50)->nullable();
            $table->string('venNaturalidade', 50)->nullable();
            $table->tinyInteger('venSexo')->default(0);
            $table->string('venComple', 50)->nullable();
            $table->string('venBanco', 50)->nullable();
            $table->string('venAgencia', 10)->nullable();
            $table->string('venConta', 15)->nullable();
            $table->string('venEmail', 80)->nullable();
            $table->string('venObservacoes', 300)->nullable();
            $table->string('venLocalizacao', 50)->nullable();
            $table->tinyInteger('venStatus')->default(0);
            $table->tinyInteger('venVinculo')->default(0);
            $table->tinyInteger('venTips')->default(0);
            $table->date('venDtCadastro')->nullable();
            $table->date('venDtDesligamento')->nullable();
            $table->string('venMaq', 50)->nullable();
            $table->string('venSusMotivo', 200)->nullable(); // Substituído por TEXT no seu dump
            $table->binary('venImagem')->nullable(); // longblob
            
            $table->integer('venIdRec')->nullable();
            $table->integer('venIdNucleo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblVendedores');
    }
};
