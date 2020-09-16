<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'nome', 'periodo_ini','periodo_fim','user_create','user_update','filial_id',
    ];

    public function filial()
    {
        return $this->hasOne(Filial::class);
    }

}
