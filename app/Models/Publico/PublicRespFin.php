<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicRespFin extends Model
{
    protected $fillable = [
        'resp_vinculo',
        'nome',
        'estado_civil',
        'nacionalidade',
        'naturalidade',
        'escolaridade',
        'profissao',
        'dt_nasc',
        'email',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'celular',
        'cpf',
        'rg',
        'orgao_emissor',
        'dt_emissor',
        'public_aluno_id',
    ];

    public function pSituacaohabitacional()
    {
        return $this->hasOne(PublicSituacaoHabitacional::class,'public_resp_fin_id','id');
    }
}
