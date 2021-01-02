<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='orderdetail';
    protected $primaryKey='ord_detail_id';
    protected $fillable =[
        'code',
        'name',
        'price',
        'quantity',
        'image'
    ];
    /** belongsTo
     * tham số thứ 1 class được tham chiếu
     * tham số thú 2 là khóa ngoại của bảng OrderDetail
     * tham số thứ 3 khóa chính bảng chính
     * SQL: select * from `orders` where `orders`.`ord_id` = 1(giá trị url truyền vào)
     */
    public function order()
    {
       // dd($this->belongsTo(Order::class,'ord_id','ord_id','ord_detail_id'));
        return $this->belongsTo(Order::class,'ord_id','ord_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }
}
