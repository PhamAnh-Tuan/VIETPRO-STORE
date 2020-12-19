<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
        	[
        		['cat_id'=>'1','cat_name' => 'Nam', 'cat_slug'=>'nam', 'cat_parent_id' => 0 ],
        		['cat_id'=>'2','cat_name' => 'Áo Nam', 'cat_slug'=>'ao-nam', 'cat_parent_id' => 1 ],
        		['cat_id'=>'3','cat_name' => 'Quần Nam', 'cat_slug'=>'quan-nam', 'cat_parent_id' => 1 ],
        		['cat_id'=>'4','cat_name' => 'Nữ', 'cat_slug'=>'nu', 'cat_parent_id' => 0 ],
        		['cat_id'=>'5','cat_name' => 'Áo Nữ', 'cat_slug'=>'ao-nu', 'cat_parent_id' => 4 ],
        		['cat_id'=>'6','cat_name' => 'Quần Nữ', 'cat_slug'=>'quan-nu', 'cat_parent_id' => 4 ]
	        ]
	    );
    }
}
