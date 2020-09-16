<?php

namespace App\Observers;

use App\Models\Admin\Filial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilialObserver
{
    public function creating(Filial $filial)
    {
        $filial->url = Str::kebab($filial->nome);
        $filial->user_create = Auth::user()->email;
        $filial->user_update = Auth::user()->email;
    }
    public function updating(Filial $filial)
    {
        $filial->url = Str::kebab($filial->nome);
        $filial->user_update = Auth::user()->email;
    }
}
