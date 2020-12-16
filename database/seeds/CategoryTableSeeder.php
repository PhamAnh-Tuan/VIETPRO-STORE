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
        DB::table('categories')->insert([
            [
                'cat_name'=>'áo nam',
                'cat_slug'=>'0',
                'cat_parent_id'=>'0'
            ],
            [
                'cat_name'=>'quần nam',
                'cat_slug'=>'0',
                'cat_parent_id'=>'0'
            ],
            [
                'cat_name'=>'áo nữ',
                'cat_slug'=>'0',
                'cat_parent_id'=>'0'
            ],
            [
                'cat_name'=>'quần nữ',
                'cat_slug'=>'0',
                'cat_parent_id'=>'0'
            ],
        ]);
    }
}
