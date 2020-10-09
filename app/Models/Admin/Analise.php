<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Analise extends Model
{
    protected $fillable =[
        'reside_proximo',
        'programa_renda',
        'deficiencia',
        'irmao_nome',
        'irmao_bolsa',
        'renda_bruta',
        'renda_capita',
        'numero_familiares',
        'desconto_sugerido',
        'desconto_anterior',
        'parecer',
        'public_aluno_id',
        'user_create',
        'user_update'
    ];
}
