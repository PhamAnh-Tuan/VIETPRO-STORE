<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'prd_name'=>'',
                'prd_code'=>'',
                'prd_slug'=>'',
                'prd_price'=>'',
                'prd_featured'=>'',
                'prd_state'=>'',
                'prd_info'=>'',
                'prd_describer'=>'',
                'prd_image'=>'',
                'cat_id'=>''
            ]
        ]);
    }
}
