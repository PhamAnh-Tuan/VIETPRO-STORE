<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password'=>Hash::make('12345678'),
                'user_fullname'=>'Đỗ Thúy Kiều',
                'user_address'=>'hưng yên',
                'user_phone'=>'0374970903',
                'remember_token'=>'',
                'user_level'=>'1'
            ],
            [
                'user_email'=>'quantrimang@gmail.com',
                'password'=>Hash::make('12345678'),
                'user_fullname'=>'quản trị xinh trai',
                'user_address'=>'Hà nội',
                'user_phone'=>'0374970904',
                'uremember_token'=>'',
                'user_level'=>'2'
            ]
        ]);
    }
}
