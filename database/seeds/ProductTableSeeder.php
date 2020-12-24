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
                'prd_name'=>'áo nam mùa xuân 1',
                'prd_code'=>'02',
                'prd_slug'=>'ao-nam-mua-dong',
                'prd_price'=>'9000',
                'prd_featured'=>'0',
                'prd_state'=>'1',
                'prd_info'=>'áo nam mùa đông lạnh run Chym thoan mat',
                'prd_describer'=>'áo nam mùa hè thoan mat ca mua dong',
                'prd_image'=>'jpg.jpg',
                'cat_id'=>'12'
            ],
            [
                'prd_name'=>'áo nam mùa hạ 1',
                'prd_code'=>'02',
                'prd_slug'=>'ao-nam-mua-dong',
                'prd_price'=>'9000',
                'prd_featured'=>'0',
                'prd_state'=>'1',
                'prd_info'=>'áo nam mùa đông lạnh run Chym thoan mat',
                'prd_describer'=>'áo nam mùa hè thoan mat ca mua dong',
                'prd_image'=>'jpg.jpg',
                'cat_id'=>'12'
            ],
            [
                'prd_name'=>'áo nam mùa xuân 12',
                'prd_code'=>'02',
                'prd_slug'=>'ao-nam-mua-dong',
                'prd_price'=>'9000',
                'prd_featured'=>'0',
                'prd_state'=>'1',
                'prd_info'=>'áo nam mùa đông lạnh run Chym thoan mat',
                'prd_describer'=>'áo nam mùa hè thoan mat ca mua dong',
                'prd_image'=>'jpg.jpg',
                'cat_id'=>'12'
            ],
            [
                'prd_name'=>'áo nam mùa hạ 12',
                'prd_code'=>'02',
                'prd_slug'=>'ao-nam-mua-dong',
                'prd_price'=>'9000',
                'prd_featured'=>'0',
                'prd_state'=>'1',
                'prd_info'=>'áo nam mùa đông lạnh run Chym thoan mat',
                'prd_describer'=>'áo nam mùa hè thoan mat ca mua dong',
                'prd_image'=>'jpg.jpg',
                'cat_id'=>'12'
            ],
        ]);
    }
}
