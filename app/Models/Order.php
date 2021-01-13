<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use Searchable;

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
    public function details()
    {
        return $this->hasMany(OrderDetail::class,'ord_id');
    }

    public function searchableAs()
    {
        return 'orders_index';
    }
    public function getScoutKey()
    {
        return $this->ord_id;
    }
    public function getScoutKeyName()
    {
        return 'ord_id';
    }
    public function toSearchableArray()
    {
        /**
         * https://www.sitepoint.com/build-lyrics-website-laravel-scout-algolia/
         * https://stackoverflow.com/questions/63450862/laravel-algolia-scout-wherein-on-relationships
         */
        $record = $this->toArray();
    
        $record['orderDetail'] = $this->details->map(function ($data) {
            return [
                'ord_detail_id' => $data['ord_detail_id'],
                'code' => $data['code'],
                'name' => $data['name'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'image' => $data['image']
            ];
        })->toArray();
        return $record;
        // $array = $this->with("details")->where("ord_id", $this->ord_id)->first()->toArray();
        // return $array;
    }
    // public $algoliaSettings = [
    //     'attributesForFaceting' => [
    //         'details',
    //     ],
    // ];
}
