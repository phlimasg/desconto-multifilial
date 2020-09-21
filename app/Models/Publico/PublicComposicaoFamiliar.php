<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicComposicaoFamiliar extends Model
{
    protected $fillable = [
        'nome',
        'parentesco',
        'idade',
        'estado_civil',
        'escolaridade',
        'profissao',
        'salario',
        'public_aluno_id'
    ];

    public function pDocumentos()
    {
        return $this->hasMany(PublicReceitasDocumentos::class);
    }
    public function pAluno()
    {
        return $this->hasOne(PublicAluno::class,'id','public_aluno_id');
    }
}
