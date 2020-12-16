<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';

    // Nếu không đặt primaryKey, mặc định khóa chính là id, và khi chạy sẽ báo lỗi: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'users.id' in 'where clause' (SQL: select * from `users` where `users`.`id` = 1 limit 1)
    protected $primaryKey='user_id';
    // protected $guarded=[];
    protected $fillable=
    [
        'user_fullname',
        'user_password',
        'user_email',
        'user_address',
        'user_level',
        'user_phone',
        'user_remenber_token'
    ];
}
