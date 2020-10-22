<?php

namespace App\Models\Admin;

use App\Models\Publico\PublicAluno;
use App\Models\Publico\PublicFiliacao;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'nome', 'periodo_ini','periodo_fim','tipo','user_create','user_update','filial_id',
    ];

    public function filial()
    {
        return $this->hasOne(Filial::class);
    }
    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
    public function pAlunos()
    {
        return $this->hasMany(PublicAluno::class);
    }
}
