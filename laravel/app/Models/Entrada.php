<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'tblEntrada';
    protected $primaryKey = 'idEntrada';

    public $timestamps = false; // não vi created_at / updated_at

    protected $fillable = [
        'entNotaFiscal',
        'entIdFornecedor',
        'entDataEntrada',
        'entValorNota',
        'entChave',
        'entIdNucleo',
    ];

    protected $casts = [
        'entDataEntrada' => 'date',
        'entValorNota'   => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'entIdFornecedor', 'idFornecedor');
    }

    public function nucleo()
    {
        return $this->belongsTo(Nucleo::class, 'entIdNucleo', 'idNucleo');
    }
}
