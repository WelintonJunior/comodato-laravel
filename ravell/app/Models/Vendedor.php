<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'tblVendedores';
    protected $primaryKey = 'idVendedor';
    public $timestamps = false;

    protected $fillable = [
        'venNome',
        'venCpf',
        'venRg',
        'venInss',
        'venPrefeitura',
        'venPis',
        'venCelular',
        'venEndereco',
        'venNumero',
        'venBairro',
        'venCidade',
        'venUf',
        'venCep',
        'venDtNasc',
        'venEstadoCivil',
        'venConjuge',
        'venNaturalidade',
        'venSexo',
        'venComple',
        'venBanco',
        'venAgencia',
        'venConta',
        'venEmail',
        'venObservacoes',
        'venLocalizacao',
        'venStatus',
        'venVinculo',
        'venTips',
        'venDtCadastro',
        'venDtDesligamento',
        'venMaq',
        'venSusMotivo',
        'venImagem',
        'venIdRec',
        'venIdNucleo',
    ];

    protected $casts = [
        'venDtNasc' => 'date',
        'venDtCadastro' => 'date',
        'venDtDesligamento' => 'date',
        'venEstadoCivil' => 'integer',
        'venSexo' => 'integer',
        'venStatus' => 'integer',
        'venVinculo' => 'integer',
        'venTips' => 'integer',
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

}
