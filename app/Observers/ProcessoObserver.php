<?php

namespace App\Observers;

use App\Models\Admin\Processo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProcessoObserver
{
    /**
     * Handle the processo "created" event.
     *
     * @param  \App\Models\Admin\Processo  $processo
     * @return void
     */
    public function creating(Processo $processo)
    {        
        $processo->url = Str::kebab($processo->nome);
        $processo->user_create = Auth::user()->email;
        $processo->user_update = Auth::user()->email;
    }

    /**
     * Handle the processo "updated" event.
     *
     * @param  \App\Models\Admin\Processo  $processo
     * @return void
     */
    public function updating(Processo $processo)
    {
        $processo->user_update = Auth::user()->email;
    }
    
}
