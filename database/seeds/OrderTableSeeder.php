<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'ord_fullname'=>'',
                'ord_address'=>'',
                'ord_email'=>'',
                'ord_phone'=>'',
                'ord_total'=>'',
                'ord_state'=>'',
            ]
        ]);
    }
}
