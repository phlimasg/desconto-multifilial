<?php

namespace App\Imports;

use App\Models\Admin\Aluno;
use Maatwebsite\Excel\Concerns\ToModel;

class AlunosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($processo_id, $importacao_id)
    {
        $this->processo_id = $processo_id;
        $this->importacao_id = $importacao_id;
    }
    public function model(array $row)
    {
        //dd($row);
        return new Aluno([
            'ra'                        => $row[0],
            'cpf'                       => $row[1], 
            'nome_aluno'                => $row[2],
            'sexo'                      => $row[3],
            'ano'                       => $row[4],
            'turma'                     => $row[5],
            'endereco'                  => $row[6],
            'complemento'               => $row[7],
            'cep'                       => $row[8],
            'turno_aluno'               => $row[9],
            'respacad'                  => $row[10],
            'respacadcpf'               => $row[11],
            'respacademail'             => $row[12],
            'respacadtel1'              => $row[13],
            'respacadtel2'              => $row[14],
            'respacaddtnascimento'      => $row[15],
            'respfin'                   => $row[16],
            'respfincpf'                => $row[17],
            'respfinemail'              => $row[18],
            'respfintel1'               => $row[19],
            'respfincel'                => $row[20],
            'respfindtnascimento'       => $row[21],
            'pai'                       => $row[22],
            'paidtnasc'                 => $row[23],
            'paicpf'                    => $row[24],
            'paitel'                    => $row[25],
            'mae'                       => $row[26],
            'maedtnasc'                 => $row[27],
            'maecpf'                    => $row[28],
            'maetel'                    => $row[29],
            'processo_id'               => $this->processo_id,
            'importacao_id'             => $this->importacao_id,
        ]);
    }
}
