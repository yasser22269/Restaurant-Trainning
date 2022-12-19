<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $admin_role= Role::where('name' , 'admin')->first();
        $mohamed = Employee::where('name', 'Mohamed')->first();
//        DB::table('employee_role')->insert([
//            'role_id' => $admin_role->id,
//            'employee_id' => $mohamed->id,
//        ]);
        Employee::where('name' , 'Mohamed')->each(function ($employee) use($roles){
            $employee->roles()->sync( $roles->pluck('id') );
        });

        Employee::where('name' , '!=' , 'Mohamed')->each(function ($employee) use($roles){
            $employee->roles()->attach( $roles->random(1)->pluck('id') );
        });


    }
}
