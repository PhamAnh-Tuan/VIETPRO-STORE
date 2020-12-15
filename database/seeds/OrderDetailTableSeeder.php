<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderdetail')->insert([
            [
                'code'=>'',
                'price'=>'',
                'quantity'=>'',
                'image'=>'',
                'ord_id'=>''
            ]
        ]);
    }
}
