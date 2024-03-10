<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizerRole = Role::create(['name' => 'organizer']);
        $spectatorRole = Role::create(['name' => 'spectator']);
        $adminRole = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);
        Permission::create(['name' => 'approve events']);
        Permission::create(['name' => 'deny events']);
        Permission::create(['name' => 'approve reservations']);
        Permission::create(['name' => 'deny reservations']);
        Permission::create(['name' => 'make reservations']);

        $organizerRole->givePermissionTo(['create events', 'edit events', 'delete events', 'approve reservations', 'deny reservations']);
        $adminRole->givePermissionTo(['approve events', 'deny events']);
        $spectatorRole->givePermissionTo('make reservations');
    }
}
