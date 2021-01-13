<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class OrderDetail extends Model
{
    use Searchable;
    
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
    public function searchableAs()
    {
        return 'OrderDetails_index';
    }
    public function getScoutKey()
    {
        return $this->ord_detail_id;
    }
    public function getScoutKeyName()
    {
        return 'ord_detail_id';
    }
}
