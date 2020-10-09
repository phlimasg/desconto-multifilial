<?php

namespace App\Observers;

use App\Models\Admin\MensagemInterna;
use Illuminate\Support\Facades\Auth;

class MensagemInternaObserver
{
    public function creating(MensagemInterna $model)
    {
        $model->user_create = Auth::user()->email;
    }
}
