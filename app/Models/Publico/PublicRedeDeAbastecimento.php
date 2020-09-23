<?php

namespace App\Models\Publico;

use Illuminate\Database\Eloquent\Model;

class PublicRedeDeAbastecimento extends Model
{
    protected $fillable =[
        'esgoto',
        'sanitaria',
        'agua',
        'energia',
        'public_aluno_id'
    ];
}
