<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     
}
