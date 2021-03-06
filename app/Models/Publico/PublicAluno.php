<?php

namespace App\Models\Publico;

use App\Models\Admin\Analise;
use App\Models\Admin\DescontoHistorico;
use App\Models\Admin\MensagemInterna;
use App\Models\Admin\MensagemUsuario;
use App\Models\Admin\Processo;
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
        return $this->hasOne(PublicFiliacao::class);
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
        return $this->hasMany(PublicDespesasEReceitas::class)->orderBy('tipo');
    }
    public function Analise()
    {
        return $this->hasOne(Analise::class,'public_aluno_id','id');
    }
    public function Processo()
    {
        return $this->hasOne(Processo::class,'id','processo_id');
    }
    public function MensagemUsuario()
    {
        return $this->hasOne(MensagemUsuario::class,'public_aluno_id','id')->latest();
    }
    public function MensagensUsuario()
    {
        return $this->hasMany(MensagemUsuario::class,'public_aluno_id','id')->latest();
    }
    public function MensagensInternas()
    {
        return $this->hasMany(MensagemInterna::class,'public_aluno_id','id')->latest();
    }
    public function DescontoHistorico()
    {
        return $this->hasMany(DescontoHistorico::class,'public_aluno_id','id')->orderBy('id','desc');
    }
    
}
