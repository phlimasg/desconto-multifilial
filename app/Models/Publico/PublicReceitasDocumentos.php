<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicReceitasDocumentos extends Model
{
    public function pComposicaoFamiliar()
    {
        return $this->hasOne(PublicComposicaoFamiliar::class,'id','public_composicao_familiar_id');
    }
}
