<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pdv extends Model {
    protected $table='tblPDV';
    protected $primaryKey='idPDV';
    public $timestamps=false;

    protected $fillable=[
        'pdvDesignacao','pdvLocalFixo','pdvCapacidade',
        'pdvSuspenso','pdvIdNucleo','pdvMotivoSuspenso'
    ];

    public function nucleo()
    { 
        return $this->belongsTo(Nucleo::class,'pdvIdNucleo','idNucleo'); 
    }


}
