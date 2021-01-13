<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='ord_id';
    protected $fillable =[
        'ord_fullname',
        'ord_address',
        'ord_email',
        'ord_phone',
        'ord_total',
        'ord_state'
    ];
    // public function details()
    // {
    //     return $this->hasMany(OrderDetail::class,'ord_detail_id','ord_id');
    // }
    public function details()
    {
        return $this->hasMany(OrderDetail::class,'ord_id');
    }
}
