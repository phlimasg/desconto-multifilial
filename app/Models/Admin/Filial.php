<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{    
    protected $fillable = [
        'codigo','nome','descricao','url','user_create','user_update'
    ];

    public function ListarProcessos()
    {
        return $this->hasMany(Processo::class);
    }
}
