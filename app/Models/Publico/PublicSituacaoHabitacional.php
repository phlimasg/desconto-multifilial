<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicSituacaoHabitacional extends Model
{
    protected $fillable = [
        'tipo_habitacao',
        'tipo_habitacao_comodos',
        'tipo_moradia',
        'tipo_residencia',
        'condicao_moradia',
        'tempo_moradia',
        'outras_moradias',
        'outras_moradias_vinculo',
        'cad_unico',
        'public_resp_fin_id',
    ];
}
