<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfile
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function Administrador(User $user)
    {        
        foreach ($user->Filial as $i) {
            foreach($i->Profile as $j){
                if($j->nome == 'Administrador')
                return true;
            }
        }
    }
    public function AssistenteSocial(User $user)
    {        
        foreach ($user->Filial as $i) {
            foreach($i->Profile as $j){
                if($j->nome == 'Assistente Social' || $j->nome == 'Administrador')
                return true;
            }
        }
    }
    public function Comissao(User $user)
    {        
        foreach ($user->Filial as $i) {
            foreach($i->Profile as $j){
                if($j->nome == 'Comissão de desconto' || $j->nome == 'Administrador')
                return true;
            }
        }
    }
    public function Supervisao(User $user)
    {        
        foreach ($user->Filial as $i) {
            foreach($i->Profile as $j){
                if($j->nome == 'Supervisão Administrativa' || $j->nome == 'Administrador')
                return true;
            }
        }
    }
}
