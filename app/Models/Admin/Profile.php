<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'user_create',
        'user_update'
    ];
}
