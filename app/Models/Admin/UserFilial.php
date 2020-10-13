<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserFilial extends Model
{
    protected $fillable  = [
        'user_create','user_update','user_id','filial_id','profile_id',
    ];
    public function Profiles()
    {
        return $this->hasMany(Profile::class,'id','profile_id');
    }
    public function Profile()
    {
        return $this->hasOne(Profile::class,'id','profile_id');
    }
    public function User()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function Filial()
    {
        return $this->hasOne(Filial::class,'id','filial_id');
    }
}
