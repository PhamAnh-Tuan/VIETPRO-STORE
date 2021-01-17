<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

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
                'user_id' => '1',
                'user_email' => 'dothuykieu@gmail.com',
                'password' => Hash::make('12345678'),
                'user_fullname' => 'Đỗ Thúy Kiều',
                'user_address' => 'hưng yên',
                'user_phone' => '0374970903',
                'remember_token' => '',
                'user_level' => '0'
            ],
            [
                'user_id' => '2',
                'user_email' => 'quantrimang@gmail.com',
                'password' => Hash::make('12345678'),
                'user_fullname' => 'quản trị xinh trai',
                'user_address' => 'Hà nội',
                'user_phone' => '0374970904',
                'uremember_token' => '',
                'user_level' => '1'
            ],
            [
                'user_id' => '3',
                'user_email' => 'superadmin@gmail.com',
                'password' => Hash::make('12345678'),
                'user_fullname' => 'SIEU XAY DA',
                'user_address' => 'Thang Long',
                'user_phone' => '0966969696',
                'uremember_token' => '',
                'user_level' => '2'
            ]

        ]);

        User::find(1)->assignRole('user');
        User::find(2)->assignRole('admin');
        User::find(3)->assignRole('super-admin');
    }
}
