<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CateroryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert(
        	[
        		['category_id'=>'12','product_id' => '1'],
        		['category_id'=>'12','product_id' => '5'],
	        ]
	    );
    }
}
