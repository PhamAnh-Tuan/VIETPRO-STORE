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
                'ord_fullname'=>'chu van huy',
                'ord_address'=>'Hung yen',
                'ord_email'=>'vanhuy@gmail.com',
                'ord_phone'=>'0371975858',
                'ord_total'=>'3',
                'ord_state'=>'5000',
            ],
            [
                'ord_fullname'=>'Chu van hoang',
                'ord_address'=>'ha noi',
                'ord_email'=>'vanhoang@gmail.com',
                'ord_phone'=>'0359555',
                'ord_total'=>'2',
                'ord_state'=>'1000',
            ],
            [
                'ord_fullname'=>'Hoang Van Cong',
                'ord_address'=>'ha noi',
                'ord_email'=>'vanhoang@gmail.com',
                'ord_phone'=>'0359555',
                'ord_total'=>'3',
                'ord_state'=>'2000',
            ],
            [
                'ord_fullname'=>'Dan chi binh',
                'ord_address'=>'ha noi',
                'ord_email'=>'chibinh@gmail.com',
                'ord_phone'=>'035945858',
                'ord_total'=>'7',
                'ord_state'=>'7000',
            ],
        ]);
    }
}
