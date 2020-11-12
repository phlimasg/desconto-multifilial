<?php

namespace App\Exports;

use App\Models\Publico\PublicAluno;
use Maatwebsite\Excel\Concerns\FromCollection;

class DeferidosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($processo_id)
    {
        $this->processo_id = $processo_id;
    }
    public function headings()
    {
        return ['ra','nome','serie','escolaridade','status','desconto_deferido'];
    }
    public function collection()
    {
        return PublicAluno::select('ra','nome','serie','escolaridade','status','desconto_deferido')
        ->where('status','Deferido')
        ->where('processo_id',$this->processo_id)
        ->get();
    }
}
