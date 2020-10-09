<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserFilial extends Model
{
    public function Profile()
    {
        return $this->hasMany(Profile::class,'id','profile_id');
    }
    public function User()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
