<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login()
    {        
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        $user = Socialite::driver('google')->user();
        //if(!empty($user->user['hd']) && $user->user->hd=='lasalle.org.br')
        //dd($user);
        !empty($user->user['hd']) && $user->user['hd']=='lasalle.org.br' ? $this->validarUsuario($user) : abort(403, 'Você não possui acesso...');
        return redirect()->route('filial.index');

    }
    public function validarUsuario($gUser){
       $user = User::where('email',$gUser->email)->first();
       $user ? Auth::loginUsingId($user->id) : abort('503','Você não possui acesso...');  
       $user->name = $gUser->name;
       $user->profile_image = $gUser->avatar;
       $user->service_token = $gUser->token;
       $user->save();

    }
}
