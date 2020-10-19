<?php

namespace App\Observers;

use App\Models\Admin\DescontoHistorico;
use Illuminate\Support\Facades\Auth;


class DescontoHistoricoObserver
{
    public function creating(DescontoHistorico $model)
    {   
        $model->user_create = Auth::user()->email;        
    }
    
}
