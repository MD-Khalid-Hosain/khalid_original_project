<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function section(){
        return $this->belongsTo('App\Section', 'section_id');
    }
    public function brand(){
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function productShortDescription(){
        return $this->hasMany('App\ProductShortDescreption');
    }

    public function productSpecification(){
        return $this->hasMany('App\ProductSpecification');
    }

    public function productFetures(){
        return $this->hasMany('App\ProductFetures');
    }
    public function productFilter(){
        return $this->hasMany('App\ProductAttributes');
    }

    protected $guarded = [];




}
