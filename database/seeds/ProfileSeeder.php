<?php

use App\Models\Admin\Filial;
use App\Models\Admin\Profile;
use App\Models\Admin\UserFilial;
use App\User;
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
        User::create([
            'name'=>'Raphael',
            'email'=>'raphael.oliveira@lasalle.org.br',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        Filial::create([
            'codigo' => 1,
            'nome' => 'Minha Filial',
            'url' => 'filial',
            'descricao' => 'descricao',
            'cep' => '00000-000',
            'estado' => 'Inicial',
            'cidade' => 'Inicial',
            'bairro' => 'Inicial',
            'numero' => '123',
            'rua' => 'Minha rual',
            'logo_url' => 'sem logo',
            'user_create'=>'sistema',
            'user_update'=>'sistema',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        UserFilial::create([
            'user_create'=>'sistema',
            'user_update'=>'sistema',
            'user_id' => 1,
            'filial_id' => 1,
            'profile_id' => 1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);      
    }
}
