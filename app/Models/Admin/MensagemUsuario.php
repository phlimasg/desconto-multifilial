<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MensagemUsuario extends Model
{
    protected $fillable = [
        'msg_usuario',
        'public_aluno_id',
        'user_create',
        'processo_id'
    ];
}
