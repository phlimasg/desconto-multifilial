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
    public function Root(User $user)
    {        
        foreach ($user->userFilial as $i) {
            foreach($i->Profiles as $j){
                if($j->nome == 'Root')
                return true;
            }
        }
    }
    public function Administrador(User $user)
    {        
        foreach ($user->userFilial as $i) {
            foreach($i->Profiles as $j){
                if($j->nome == 'Administrador' || $j->nome == 'Root')
                return true;
            }
        }
    }
    public function AssistenteSocial(User $user)
    {        
        foreach ($user->userFilial as $i) {
            foreach($i->Profiles as $j){
                if($j->nome == 'Assistente Social' || $j->nome == 'Administrador' || $j->nome == 'Root')
                return true;
            }
        }
    }
    public function Comissao(User $user)
    {        
        foreach ($user->userFilial as $i) {
            foreach($i->Profiles as $j){
                if($j->nome == 'Comissão de desconto' || $j->nome == 'Administrador' || $j->nome == 'Root')
                return true;
            }
        }
    }
    public function Supervisao(User $user)
    {        
        foreach ($user->userFilial as $i) {
            foreach($i->Profiles as $j){
                if($j->nome == 'Supervisão Administrativa' || $j->nome == 'Administrador' || $j->nome == 'Root')
                return true;
            }
        }
    }
}
