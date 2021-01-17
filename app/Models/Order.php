<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable, Searchable;
    //khi chạy thì xoá đoạn /XOA đi
    protected $slackChannels= [
        'don-hang' => 'https://hooks.slack.com/services/XOA/T01HZ3FJSKH/B01JEC8FMQT/OxIGfe3FUksZ3r15fpUrWK6J',
        'nhan-vien' => 'https://hooks.slack.com/services/XOA/T01HZ3FJSKH/B01JELUDTSP/nnYI1CcQbBHtXWC5vG1ggCq6',
    ];    
    protected $slack_url = null;
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
    //// slack
    
    public function setSlackUrl($url){
        $this->slack_url = $url;
        return $this;
    }
    public function setSlackChannel($name){
        if(isset($this->slackChannels[$name])){
            $this->setSlackUrl($this->slackChannels[$name]);
        }
        return $this;
    }
    public function routeNotificationForSlack($notification){
        if($this->slack_url === null){
            return $this->slackChannels['don-hang'];
        }else{
            return $this->slack_url;
        }
    }
}
