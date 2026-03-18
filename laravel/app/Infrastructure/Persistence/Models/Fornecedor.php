<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model {
    protected $table='tblFornecedor';
    protected $primaryKey='idFornecedor';
    public $timestamps=false;

    protected $fillable=[
        'forRazSocial','forCnpj','forCep','forTelefone',
        'forContato','forNumero','forComplemento',
        'forIe','forCelular','forSuspenso',
        'forSusMotivo','forIdNucleo'
    ];

    public function nucleo(){ return $this->belongsTo(Nucleo::class,'forIdNucleo','idNucleo'); }
}
