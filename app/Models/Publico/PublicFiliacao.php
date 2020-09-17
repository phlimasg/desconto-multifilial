<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicFiliacao extends Model
{
    protected $fillable =[
        'mae_nome',
        'mae_cpf',
        'mae_rg',
        'mae_dt_nasc',
        'mae_telefone',
        'mae_tipo_guarda',
        'pai_nome',
        'pai_cpf',
        'pai_rg',
        'pai_dt_nasc',
        'pai_telefone',
        'pai_tipo_guarda',
        'public_aluno_id',
    ];
}
