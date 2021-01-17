<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

// class User extends Model 
class User extends Authenticatable 
{
    use Searchable;

    protected $table='users';
    protected $primaryKey='user_id';
    protected $fillable=
    [
        'user_id',
        'user_fullname',
        'user_password',
        'user_email',
        'user_address',
        'user_level',
        'user_phone',
        'user_remenber_token',
        'provider',
        'provider_id',
        'avatar',

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

    /**
     * Laravel Scout
     */
    public function searchableAs()
    {
        return 'users_index';
    }
    public function getScoutKey()
    {
        return $this->user_id;
    }
    public function getScoutKeyName()
    {
        return 'user_id';
    }
    /**
     * https://laravel.com/docs/7.x/scout#conditionally-searchable-model-instances
     */
}
