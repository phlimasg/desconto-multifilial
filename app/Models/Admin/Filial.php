<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{    
    protected $fillable = [
        'codigo',
        'nome',
        'descricao',
        'url',
        'logo_url',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'user_create','user_update'
    ];

    public function ListarProcessos()
    {
        return $this->hasMany(Processo::class);
    }
}
