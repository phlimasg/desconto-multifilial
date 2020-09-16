<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
            'ra',
            'cpf',
            'nome_aluno',
            'sexo',
            'ano',
            'turma',
            'endereco',
            'complemento',
            'cep',
            'turno_aluno',
            'respacad',
            'respacadcpf',
            'respacademail',
            'respacadtel1',
            'respacadtel2',
            'respacaddtnascimento',
            'respfin',
            'respfincpf',
            'respfinemail',
            'respfintel1',
            'respfincel',
            'respfindtnascimento',
            'pai',
            'paidtnasc',
            'paicpf',
            'paitel',
            'mae',
            'maedtnasc',
            'maecpf',
            'maetel',
            'user_create',
            'user_update',
            'importacao_id',
            'processo_id'
    ];
}
