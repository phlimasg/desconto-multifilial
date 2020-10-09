<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MensagemInterna extends Model
{
    protected $fillable = [
        'msg_interna',
        'public_aluno_id',
        'user_create',
    ];
}
