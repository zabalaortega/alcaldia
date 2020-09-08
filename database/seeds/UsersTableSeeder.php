<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'apellidos' => 'Administrador',
            'tipo_id' => '1',
            'dependencia_id' => '1',
            'estado' => 1,
        ]);

        $admin->assignRole('admin');
    }
}
