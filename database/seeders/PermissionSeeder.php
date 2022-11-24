<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title' => 'show',
            ],
            [
                'title' => 'create',
            ],
            [
                'title' => 'update',
            ],
            [
                'title' => 'delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
