<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'IT'.' '.'Department',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('departments')->insert([
            'name' => 'Finance'.' '.'Department',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('departments')->insert([
            'name' => 'Security'.' '.'Department',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('departments')->insert([
            'name' => 'Human Resource'.' '.'Department',
            'created_at' => DB::raw('NOW()'),
        ]);
    }
}
