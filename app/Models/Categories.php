<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Categories extends Model
{
    use Searchable;
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
        return $this->hasMany(Products::class, 'cat_id');
    }

    public function Productss()
    {
        return $this->belongsToMany(Products::class,'category_product','category_id','product_id');
    }
    public function Productsss()
    {
        /**
         * 
         */
        return $this->hasMany(Products::class, 'cat_id','cat_id');
    }

    /**
     * Algolia
     */
    public function searchableAs()
    {
        return 'category_index';
    }
    public function getScoutKey()
    {
        return $this->cat_id;
    }
    public function getScoutKeyName()
    {
        return 'cat_id';
    }
}
