<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
    protected $fillable =
    [
        'cat_id',
        'cat_name',
        'cat_slug',
        'cat_parent_id'
    ];

    public function Products()
    {
        return $this->hasMany('App\Product', 'cat_id');
    }

    public function Productss()
    {
        return $this->belongsToMany(Products::class,'category_product','category_id','product_id');
    }
}
