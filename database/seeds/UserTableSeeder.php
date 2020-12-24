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
                'user_email'=>'dothuykieu@gmail.com',
                'user_password'=>'12345678',
                'user_fullname'=>'Đỗ Thúy Kiều',
                'user_address'=>'hưng yên',
                'user_phone'=>'0374970903',
                'user_remenber_token'=>'',
                'user_level'=>'1'
            ],
            [
                'user_email'=>'quantrimang@gmail.com',
                'user_password'=>'12345678',
                'user_fullname'=>'quản trị xinh trai',
                'user_address'=>'Hà nội',
                'user_phone'=>'0374970904',
                'user_remenber_token'=>'',
                'user_level'=>'2'
            ]
        ]);
    }
}
