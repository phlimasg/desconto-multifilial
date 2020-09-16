<?php

namespace App\Observers;

use App\Models\Admin\Aluno;
use Illuminate\Support\Facades\Auth;


class AlunoObserver
{
    public function creating(Aluno $model)
    {   
        $model->user_create = Auth::user()->email;
        $model->user_update = Auth::user()->email;
    }
    public function updating(Aluno $model)
    {
        $model->user_update = Auth::user()->email;
    }
    
}
