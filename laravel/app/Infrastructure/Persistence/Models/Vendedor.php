<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'tblVendedores';
    protected $primaryKey = 'idVendedor';
    public $timestamps = false;

    protected $fillable = [
        'venNome', 'venCpf', 'venRg', 'venDtNasc', 'venCep', 'venSuspenso',
        'venSusMotivo', 'venChave', 'venCelular', 'venNumCasa', 'venCompCasa', 'venInss',
        'venPrefeitura', 'venAltura', 'venPeso', 'venSexo', 'venCalcado',
        'venTorax', 'venCabeca', 'venCintura', 'venQuadril', 'venBusto', 'venPescoco',
        'venCoxa', 'venStatus', 'venCracha', 'venCrachaLiberado', 'venCrachaData',
        'venIdMaquineta', 'venEmail'
    ];

    protected $casts = [
        'venDtNasc' => 'date',
        'venCrachaData' => 'date',
        'venSuspenso' => 'integer',
        'venCrachaLiberado' => 'string',
        'venStatus' => 'string',
        'venSexo' => 'string',
        'venAltura' => 'decimal:3',
        'venPeso' => 'decimal:3',
        'venTorax' => 'decimal:3',
        'venCabeca' => 'decimal:3',
        'venCintura' => 'decimal:3',
        'venQuadril' => 'decimal:3',
        'venBusto' => 'decimal:3',
        'venPescoco' => 'decimal:3',
        'venCoxa' => 'decimal:3',
    ];

    // 🔥 Trata blob pra evitar erro UTF-8
    public function getVenSusMotivoAttribute($value)
    {
        return is_string($value) ? $value : '';
    }

    // 🔥 Converter imagem para base64 (opcional)
    public function getVenImagemBase64Attribute()
    {
        return $this->venImagem
            ? 'data:image/jpeg;base64,' . base64_encode($this->venImagem)
            : null;
    }

    // Relacionamentos (se necessário)
    public function nucleo()
    {
        return $this->belongsTo(Nucleo::class, 'venIdNucleo');
    }


    
    // public function maquineta()
    // {
    //     return $this->belongsTo(Maquineta::class, 'venIdMaquineta');
    // }
}