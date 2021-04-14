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

        Permission::create(['name' => 'admin.home.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.create'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.user.edit'])->syncRoles([$role1]);;
        Permission::create(['name' => 'admin.user.destroy'])->syncRoles([$role1]);;
    }
}
