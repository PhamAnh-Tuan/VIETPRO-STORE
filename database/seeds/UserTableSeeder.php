<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_email'=>'admin@gmail.com',
                'user_password'=>'12345678',
                'user_fullname'=>'huy xấu tri',
                'user_address'=>'hưng yên',
                'user_phone'=>'0374970903',
                'user_remenber_token'=>'',
                'user_level'=>'1'
            ],
            [
                'user_email'=>'quantri@gmail.com',
                'user_password'=>'12345678',
                'user_fullname'=>'quản trị xinh tri',
                'user_address'=>'Hà nội',
                'user_phone'=>'0374970904',
                'user_remenber_token'=>'',
                'user_level'=>'2'
            ]
        ]);
    }
}
