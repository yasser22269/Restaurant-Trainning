<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Payment;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'mohamed',
                'email' => 'm.mohamedeid11@gmail.com',
                'password' => 'mohamed',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
            ],
        ];

        foreach($users as $i => $one)
        {

            Employee::factory()->create(
                [
                    'email' => $one['email'],
                    'name' => ucfirst($one['name']),
                    'password' => Hash::make($one['password'])
                ]
            );

        }
        Employee::factory()->count(5)->create();

    }
}
