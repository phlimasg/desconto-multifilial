<?php

namespace App\Observers;


use App\Models\Admin\ProcessosOpcoes;
use Illuminate\Support\Facades\Auth;



class ProcessoOpcoesObserver
{
    /**
     * Handle the processo "created" event.
     *
     * @param  \App\Models\Admin\Processo  $processo
     * @return void
     */
    public function creating(ProcessosOpcoes $processo)
    {   
        $processo->user_create = Auth::user()->email;
        $processo->user_update = Auth::user()->email;
    }

    /**
     * Handle the processo "updated" event.
     *
     * @param  \App\Models\Admin\Processo  $processo
     * @return void
     */
    public function updating(ProcessosOpcoes $processo)
    {
        $processo->user_update = Auth::user()->email;
    }
    
}
