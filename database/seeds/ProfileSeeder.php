<?php

use App\Models\Admin\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'nome'=>'Root',
            'descricao'=>'Gerencia tudo e todos!',
            'user_create'=>'sistema',
            'user_update'=>'sistema',
        ]);
        Profile::create([
            'nome'=>'Administrador',
            'descricao'=>'Acesso total ao sistema.',
            'user_create'=>'sistema',
            'user_update'=>'sistema',
        ]);
        Profile::create([
            'nome'=>'Assistente Social',
            'descricao'=>'Acesso, vizualização e criação dos pareceres sociais.',
            'user_create'=>'sistema',
            'user_update'=>'sistema',
        ]);
        Profile::create([
            'nome'=>'Comissão de desconto',
            'descricao'=>'Acesso, vizualização e criação dos pareceres da comissão.',
            'user_create'=>'sistema',
            'user_update'=>'sistema',
        ]);
        Profile::create([
            'nome'=>'Supervisão Administrativa',
            'descricao'=>'Acesso, vizualização e criação e deferimento dos processos.',
            'user_create'=>'sistema',
            'user_update'=>'sistema',
        ]);
    }
}
