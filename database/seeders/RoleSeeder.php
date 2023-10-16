<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'editor']);

        Permission::create(['name' => 'producto.api.index']);
        Permission::create(['name' => 'producto.api.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'producto.api.store'])->syncRoles([$role1,$role2]);;
        Permission::create(['name' => 'producto.api.show']);
        Permission::create(['name' => 'producto.api.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'producto.api.update'])->syncRoles([$role1,$role2]);;
        Permission::create(['name' => 'producto.api.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'user.api.index'])->syncRoles($role1);
        Permission::create(['name' => 'user.api.create'])->syncRoles($role1);
        Permission::create(['name' => 'user.api.store'])->syncRoles($role1);
        Permission::create(['name' => 'user.api.show'])->syncRoles($role1);
        Permission::create(['name' => 'user.api.edit'])->syncRoles($role1);
        Permission::create(['name' => 'user.api.update'])->syncRoles($role1);
        Permission::create(['name' => 'user.api.destroy'])->syncRoles($role1);
    }
}
