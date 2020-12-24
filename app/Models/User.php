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
        'user_id',
        'user_fullname',
        'user_password',
        'user_email',
        'user_address',
        'user_level',
        'user_phone',
        'user_remenber_token'
    ];
    // public function info()
    // {
    //    return $this->hasOne(Info::class,'user_id','user_id');
    // }

    /** hasone()
     * tham số thứ nhất: Tên Class tham chiếu
     * tham số thứ hai: foreign_key ở trong bảng ở tham số thứ nhất
     * Nếu không quy ước khóa ngoại -> mặc định sẽ có khóa ngoại là user_id   
     * https://laravel.com/docs/7.x/eloquent-relationships#one-to-one
     * Error: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'info.user_user_id' in 'where clause' (SQL: select * from `info` where `info`.`user_user_id` = 2 and `info`.`user_user_id` is not null limit 1)
     * -> khi quan hệ dc xác định = phương thức hasOne thành công -> có thể truy xuất dữ liệu bản ghi
     */
    public function info()
    {
        return $this->hasOne(Info::class,'user_id','user_id');
    }
    public function infoWhere()
    {
        return $this->hasOne(Info::class,'user_id','user_id')->where('address','=','hung yen');
    }
}
