<?php

namespace App\Observers;

use App\Models\Admin\MensagemInterna;
use App\Models\Admin\MensagemUsuario;
use Illuminate\Support\Facades\Auth;

class MensagemUsuarioObserver
{
    public function creating(MensagemUsuario $model)
    {
        $model->user_create = Auth::user()->email;
    }
}
