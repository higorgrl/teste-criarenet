<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
    
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $hoje = new DateTime();
        $intervalo = new DateInterval("PT1S");
        //users
        $user = [
            'usr_email' => 'admin@gmail.com',
            'usr_name' => 'Administrador',
            'password' =>  Hash::make('12345678'),
            'created_at' => $hoje->add($intervalo)
        ];
        DB::table('users')->insert($user);

        //perfil
        DB::table('roles')->insert($role);
        $role = [
            'rol_name' => 'Adminstrador',
            'rol_label' => 'Está pessoa tem diversas capacidades no sistema',
            'created_at' => $hoje->add($intervalo)
        ];
        DB::table('roles')->insert($role);

        //vinculo entre usuario e perfil
        $role_user = [
            'rus_usr_id' => 1,
            'rus_rol_id' => 2,
            'created_at' => $hoje->add($intervalo)
        ];
        DB::table('roles_user')->insert($role_user);


        //PESSOAS
        DB::table('pessoas')->insert([
            'pes_nome' => 'José Andrade',
            'pes_cpf' => '04080757247',
            'pes_telefone' => '11987654321',
            'pes_email' => 'jose@test.com.br',
            'created_at' => $hoje->add($intervalo)
        ]);
        DB::table('pessoas')->insert([
            'pes_nome' => 'Manoel Silva',
            'pes_cpf' => '77797584192',
            'pes_telefone' => '11987654321',
            'pes_email' => 'manoel@test.com.br',
            'created_at' => $hoje->add($intervalo)
        ]);
        DB::table('pessoas')->insert([
            'pes_nome' => 'Augusto Maier',
            'pes_cpf' => '45486737688',
            'pes_telefone' => '11987654321',
            'pes_email' => 'augusto@test.com.br',
            'created_at' => $hoje->add($intervalo)
        ]);
        DB::table('pessoas')->insert([
            'pes_nome' => 'My name 4',
            'pes_cpf' => '74668869066',
            'pes_telefone' => '11987654321',
            'pes_email' => 'myemail4@test.com.br',
            'created_at' => $hoje->add($intervalo)
        ]);

    } 
}
