<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProcessosOpcoes extends Model
{
    protected $fillable = [
        'vagas',
        'renda_ini',
        'renda_fim',
        'percentual',
        'processo_id'
    ];
}
