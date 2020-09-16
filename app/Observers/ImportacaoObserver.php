<?php

namespace App\Observers;

use App\Models\Admin\Importacao;
use Illuminate\Support\Facades\Auth;


class ImportacaoObserver
{
    public function creating(Importacao $model)
    {   
        $model->user_create = Auth::user()->email;
        $model->user_update = Auth::user()->email;
    }
    public function updating(Importacao $model)
    {
        $model->user_update = Auth::user()->email;
    }
    
}
