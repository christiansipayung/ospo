<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'This role has authority to manage users, roles, and policies',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Finance',
            'description' => 'This role has authority to approve purchase orders',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Supervisor',
            'description' => 'This role has authority to approve purchase orders',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Purchasing',
            'description' => 'This role has authority to manage status of purchase orders',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Employee',
            'description' => 'This role has access to make purchase orders',
            'created_at' => DB::raw('NOW()'),
        ]);
    }
}
