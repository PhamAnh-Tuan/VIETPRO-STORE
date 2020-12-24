<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='ord_id';
    // public function details()
    // {
    //     return $this->hasMany(OrderDetail::class,'ord_detail_id','ord_id');
    // }
    public function details()
    {
        return $this->hasMany(OrderDetail::class,'ord_id');
    }
}
