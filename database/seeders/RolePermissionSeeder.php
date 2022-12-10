<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        Role::where('name', 'admin')->each(function ($roles) use ($permissions){
            $roles->permissions()->attach( $permissions->pluck('id') );
        });
    }
}
