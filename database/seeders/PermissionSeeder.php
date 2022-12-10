<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'title' => 'create',
        ]);
        DB::table('permissions')->insert([
            'title' => 'show',
        ]);
        DB::table('permissions')->insert([
            'title' => 'update',
        ]);
        DB::table('permissions')->insert([
            'title' => 'delete',
        ]);
    }
}
