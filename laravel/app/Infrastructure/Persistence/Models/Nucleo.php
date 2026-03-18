<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Nucleo extends Model {
    protected $table='tblNucleo';
    protected $primaryKey='idNucleo';
    public $timestamps=false;

    protected $fillable=[
        'nucRazaoSocial','nucFantasia','nucIE','nucCNPJ',
        'nucEndereco','nucNumero','nucCep','nucTelefone',
        'nucEmail','nucSuspenso'
    ];

    public function pdvs(){ return $this->hasMany(Pdv::class,'pdvIdNucleo','idNucleo'); }
    public function produtos(){ return $this->hasMany(Produto::class,'proIdNucleo','idNucleo'); }
    public function fornecedores(){ return $this->hasMany(Fornecedor::class,'forIdNucleo','idNucleo'); }
}
