<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'status_name' => 'Order has been placed',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('order_status')->insert([
            'status_name' => 'Order has been Approved',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('order_status')->insert([
            'status_name' => 'Order has been purchased',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('order_status')->insert([
            'status_name' => 'Order has arrived',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('order_status')->insert([
            'status_name' => 'Order is canceled',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('order_status')->insert([
            'status_name' => 'Order is declined',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('order_status')->insert([
            'status_name' => 'Finished',
            'created_at' => DB::raw('NOW()'),
        ]);
    }
}
