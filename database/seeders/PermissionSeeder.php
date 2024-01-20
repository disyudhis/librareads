<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'read member', 'group_name' => 'member', 'view_name' => 'read member', 'type' => 'admin']);
        Permission::create(['name' => 'create member', 'group_name' => 'member', 'view_name' => 'create member', 'type' => 'admin']);
        Permission::create(['name' => 'update member', 'group_name' => 'member', 'view_name' => 'update member', 'type' => 'admin']);
        Permission::create(['name' => 'delete member', 'group_name' => 'member', 'view_name' => 'delete member', 'type' => 'admin']);

        Permission::create(['name' => 'read books', 'group_name' => 'books', 'view_name' => 'read books', 'type' => 'admin']);
        Permission::create(['name' => 'create books', 'group_name' => 'books', 'view_name' => 'create books', 'type' => 'admin']);
        Permission::create(['name' => 'update books', 'group_name' => 'books', 'view_name' => 'update books', 'type' => 'admin']);
        Permission::create(['name' => 'delete books', 'group_name' => 'books', 'view_name' => 'delete books', 'type' => 'admin']);

        Permission::create(['name' => 'read statistic', 'group_name' => 'statistic', 'view_name' => 'read statistic', 'type' => 'admin']);
        Permission::create(['name' => 'create statistic', 'group_name' => 'statistic', 'view_name' => 'create statistic', 'type' => 'admin']);

        $role = Role::create(['name' => 'staff member', 'guard_name' => 'web', 'slug' => 'staff member']);
        $role->givePermissionTo(['read member', 'create member', 'update member', 'delete member']);

        $role = Role::create(['name' => 'staff books', 'guard_name' => 'web', 'slug' => 'staff books']);
        $role->givePermissionTo(['read books', 'create books', 'update books', 'delete books']);

        $role = Role::create(['name' => 'staff statistic', 'guard_name' => 'web', 'slug' => 'staff statistic']);
        $role->givePermissionTo(['read statistic', 'create statistic']);
    }
}
