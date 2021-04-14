<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Jefe de turno']);
        $role3 = Role::create(['name' => 'Vendedor']);
        $role4 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'admin.home.index',
                                'description' => 'Ver inicio'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.user.index',
                                'description' => 'Ver listado de usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.user.create',
                                'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.edit',
                                'description' => 'Asignar un roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.delete',
                                'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index',
                                'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
                                'description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit',
                                'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.delete',
                                'description' => 'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.seller.index',
                                'description' => 'Ver lista de ventas'])->syncRoles([$role1,$role2,$role3]);

    }
}
