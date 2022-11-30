<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->delete();
        DB::table('employees')->insert([
            'name'          => 'mahmoud',
            'email'         => 'mahmoud@gmail.com',
            'phone'         => '01098822311',
            'nid'           => '1',
            'password'      => Hash::make('password'),
            'age'           => '28',
            'address'       => 'cairo',
            'salary'        => '4000',
            'start_date'    => '2022-11-08',
            'position'      => 'employee',
            'office'        => 'intro',
            'status'        => '1',
        ]);
        DB::table('employees')->insert([
            'name'          => 'yasser',
            'email'         => 'yasser.m22291@gmail.com',
            'phone'         => '01064146183',
            'nid'           => '1231',
            'password'      => Hash::make('123456789'),
            'age'           => '22',
            'address'       => 'cairo',
            'salary'        => '4000',
            'start_date'    => '2022-11-08',
            'position'      => 'employee',
            'office'        => 'intro',
            'status'        => '1',
        ]);
    }
}
