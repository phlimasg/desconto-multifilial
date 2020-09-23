<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicVeiculos extends Model
{
    protected $fillable = [
        'veiculo_fabricante',
        'veiculo_ano',
        'veiculo_modelo',
        'veiculo_placa',
        'public_resp_fin_id',
    ];
}
