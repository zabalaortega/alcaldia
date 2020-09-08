<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosSeeder extends Seeder
{
    
    public function run()
    {
        //reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        //create permission
        Permission::create(['name' => 'create prestamo']);
        Permission::create(['name' => 'read prestamo']);
        Permission::create(['name' => 'update prestamo']);
        Permission::create(['name' => 'delete prestamo']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        //create roles and aasign created permission

        $role = Role::create(['name' => 'funcionario']);
        $role->givePermissionTo('create prestamo');
        
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
