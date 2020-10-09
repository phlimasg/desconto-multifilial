<?php

namespace App\Observers;

use App\Models\Admin\Analise;
use Illuminate\Support\Facades\Auth;

class AnaliseObserver
{
    public function creating(Analise $model)
    {
        $model->user_create = Auth::user()->email;
        $model->user_update = Auth::user()->email;
    }
    public function updating(Analise $model)
    {        
        $model->user_update = Auth::user()->email;
    }    
}
