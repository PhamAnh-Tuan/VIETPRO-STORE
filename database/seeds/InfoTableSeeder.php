<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info')->insert([
            'cmt'=>'145818594',
            'address'=>'da nang',
            'user_id'=>'2',
        ]);
    }
}
