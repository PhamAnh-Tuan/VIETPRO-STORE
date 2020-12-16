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
                'prd_name'=>'áo nam mùa hè',
                'prd_code'=>'01',
                'prd_slug'=>'0',
                'prd_price'=>'5000',
                'prd_featured'=>'0',
                'prd_state'=>'1',
                'prd_info'=>'',
                'prd_describer'=>'',
                'prd_image'=>'',
                'cat_id'=>'1'
            ],
            [
                'prd_name'=>'áo nam mùa đông',
                'prd_code'=>'02',
                'prd_slug'=>'1',
                'prd_price'=>'6000',
                'prd_featured'=>'1',
                'prd_state'=>'1',
                'prd_info'=>'',
                'prd_describer'=>'',
                'prd_image'=>'',
                'cat_id'=>'1'
            ],
        ]);
    }
}
