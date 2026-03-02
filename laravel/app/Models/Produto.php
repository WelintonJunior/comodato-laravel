<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    protected $table='tblProdutos';
    protected $primaryKey='idProduto';
    public $timestamps=false;

    protected $fillable=[
        'proItem','proDescriao','proPrecoCusto','proPrecoVenda',
        'proLucro','proSaldoAtual','proPacote','proMultiplicador',
        'proCodAutomacao','proSaldoMinimo','proLucroP','proAtalho',
        'proAtalhoLabel','proPrecoVendedor','proLucroPVendedor',
        'proPacoteCheck','proIdNucleo'
    ];

    public function nucleo(){ return $this->belongsTo(Nucleo::class,'proIdNucleo','idNucleo'); }
}
