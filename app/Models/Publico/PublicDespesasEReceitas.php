<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicDespesasEReceitas extends Model
{
    protected $fillable = [
        'tipo',
        'descricao',
        'valor',
        'observacao',
        'public_aluno_id',
    ];

    public function pDespesasEReceitasDocumentos()
    {
        return $this->hasMany(PublicDespesasEReceitasDocumentos::class,'despesas_e_receita_id','id');
    }
}
