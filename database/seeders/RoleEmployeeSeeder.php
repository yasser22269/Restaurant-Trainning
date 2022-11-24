<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::findOrFail(1)->roles()->sync(1);
        Employee::findOrFail(2)->roles()->sync(2);
    }
}
