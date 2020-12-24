<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table='info';
    protected $primaryKey='id';
    protected $fillable=[
        'cmt',
        'user_id',
        'address',
        'level'
    ];
    
    public function user()
    {
       return $this->belongsTo(User::class,'user_id','user_id');
    }
}
