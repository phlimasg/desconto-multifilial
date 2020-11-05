<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RaLiberado extends Model
{
    protected $fillable = [
        'ra','processo_id','user_create'
    ];
}
