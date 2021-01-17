<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Tạo quyền
        Permission::create(['name' => 'add']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);

        // Tạo Role(Chức vụ) và gán quyền
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('add');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('add');
        $role2->givePermissionTo('edit');

        $role3 = Role::create(['name' => 'super-admin']);
    }
}
