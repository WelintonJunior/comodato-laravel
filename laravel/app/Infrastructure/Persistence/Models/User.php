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

    /**
     * Retorna iniciais do nome do usuário (ex: "João Silva" → "JS").
     */
    public function initials(): string
    {
        if (empty($this->name)) {
            return '';
        }
        $parts = preg_split('/\s+/', trim($this->name));
        $initials = '';
        foreach ($parts as $word) {
            $initials .= mb_substr($word, 0, 1);
            if (mb_strlen($initials) >= 2) {
                break;
            }
        }
        return mb_strtoupper($initials);
    }
}
