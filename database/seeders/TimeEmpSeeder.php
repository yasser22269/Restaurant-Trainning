<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeEmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_emps')->delete();
        DB::table('time_emps')->insert([
            'emp_id'          => '1',
            'start_at'         => '12:00:00',
            'end_at'         => '00:00:00',
        ]);

    }
}
