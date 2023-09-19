<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{

    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('12345678'),
        ]);

        $staff = User::create([
            'name'=>'staff',
            'email'=>'staff@staff.com',
            'password'=>bcrypt('12345678')
        ]);
        $seller = User::create([
            'name'=>'seller',
            'email'=>'seller@seller.com',
            'password'=>bcrypt('12345678')
        ]);
        $customer = User::create([
            'name'=>'user',
            'email'=>'customer@customer.com',
            'password'=>bcrypt('12345678')
        ]);
        $admin_role = Role::create(['name' => 'admin']);
        $staff_role = Role::create(['name' => 'staff']);
        $seller_role = Role::create(['name' => 'seller']);
        $customer_role = Role::create(['name' => 'customer']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);



        $admin->assignRole($admin_role);
        $staff->assignRole($staff_role);
        $seller->assignRole($seller_role);
        $customer->assignRole($customer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
