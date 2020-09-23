<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicAluno extends Model
{
    protected $fillable =[
        'ra',
        'serie',
        'escolaridade',
        'nome',
        'nacionalidade',
        'naturalidade',
        'sexo',
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
        'cpf',
        'rg',
        'orgao_emissor',
        'dt_emissor',
        'esc_origem',
        'esc_origem_tipo',
        'esc_origem_desconto',
        'reside_proximo',
        'transp_utilizado',
        'deficiencia',
        'deficiencia_tipo',
        'irmao',
        'irmao_ra',
        'processo_id',
    ];
    public function pFiliacao()
    {
        return $this->hasMany(PublicFiliacao::class);
    }
    public function pComposicaoFamiliar()
    {
        return $this->hasMany(PublicComposicaoFamiliar::class);
    }
    public function pResponsavelFinanceiro()
    {
        return $this->hasOne(PublicRespFin::class,'public_aluno_id','id');
    }
    public function pRedeDeAbastecimento()
    {
        return $this->hasOne(PublicRedeDeAbastecimento::class,'public_aluno_id','id');
    }
    public function pDespesasEReceitas()
    {
        return $this->hasMany(PublicDespesasEReceitas::class);
    }
    
}
