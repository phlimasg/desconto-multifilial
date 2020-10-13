<?php

namespace App\Observers;


use App\Models\Admin\UserFilial;
use Illuminate\Support\Facades\Auth;


class UserFilialObserver
{
    public function creating(UserFilial $model)
    {   
        $model->user_create = Auth::user()->email;
        $model->user_update = Auth::user()->email;
    }
    public function updating(UserFilial $model)
    {
        $model->user_update = Auth::user()->email;
    }
    
}
