<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = Permission::create(['name' => 'users.list']);
        $user_view = Permission::create(['name' => 'users.view']);
        $user_create = Permission::create(['name' => 'users.create']);
        $user_update = Permission::create(['name' => 'users.update']);
        $user_delete = Permission::create(['name' => 'users.delete']);

        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_delete,
            $user_view
        ]);

        $admin = User::create([
            'name' => 'Ramakanth Rapaka',
            'email' => 'ramakanth.rapaka@yopmail.com',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole($admin_role);
        $admin->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_delete,
            $user_view
        ]);

        $operations = User::create([
            'name' => 'Srikanth Rapaka',
            'email' => 'srikanth.rapaka@yopmail.com',
            'password' => bcrypt('password')
        ]);

        $operation_role = Role::create(['name' => 'operations']);

        $operations->assignRole($operation_role);
        $operations->givePermissionTo([
            $user_list
        ]);

        $operation_role->givePermissionTo([
            $user_list,
        ]);
    }
}
