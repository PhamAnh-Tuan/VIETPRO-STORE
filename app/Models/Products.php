<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Notifiable,CrudTrait;
class Products extends Model
{
 
    protected $table = 'products';
    protected $primaryKey = 'prd_id';
    protected $fillable =
    [
        'prd_name',
        'prd_code',
        'prd_slug',
        'prd_price',
        'prd_featured',
        'prd_state',
        'prd_info',
        'prd_describer',
        'prd_image',
        'cat_name'
    ];
    public function Categories(){
        return $this->belongsTo('App\Models\Categories','cat_id','cat_id');
     }
    public function categoryy(){
        return $this->belongsToMany(Categories::class,'category_product','product_id','category_id');
     }
     /**
      * cat_id khoa ngoai bang prd
      * prd_id khoa chinh bang prd
      */
     public function cate()
     {
        return $this->belongsTo(Categories::class,'cat_id','prd_id');
     }
     public function setCatAttribute($value)
     {
         $this->attributes['cat_id'] = json_encode($value);
     }
   
     /**
      * Get the categories
      *
      */
     public function getCatAttribute($value)
     {
         return $this->attributes['cat_id'] = json_decode($value);
     }
}