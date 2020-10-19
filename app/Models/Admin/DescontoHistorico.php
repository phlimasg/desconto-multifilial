<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DescontoHistorico extends Model
{
    protected $fillable = [
        'percentual',
        'user_create',
        'analise_id',
        'public_aluno_id',
        'processo_id'
    ];

    public function User()
    {
        return $this->hasOne(User::class,'email','user_create');
    }
}
