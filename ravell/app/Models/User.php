<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'usuLogin',
        'password',
        'usuSuspenso',
        'usuCPF',
        'email',
        'usuIdRec',
        'usuIdNucleo',
    ];

    // Indica que o identificador do Auth NÃO é "id"
    public function getAuthIdentifierName()
    {
        return 'idUsuario';
    }

    public function nucleo()
    {
        return $this->belongsTo(Nucleo::class, 'usuIdNucleo', 'idNucleo');
    }
}
