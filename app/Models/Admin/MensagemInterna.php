<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MensagemInterna extends Model
{
    protected $fillable = [
        'msg_interna',
        'public_aluno_id',
        'user_create',
        'processo_id'
    ];
    public function User()
    {
        return $this->hasOne(User::class,'email','user_create');
    }
}
