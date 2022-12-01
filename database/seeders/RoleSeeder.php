<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'is_system'    => true,
                'name' => 'Admin',
            ],
            [
                'id'    => 2,
                'is_system'    => false,
                'name' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
