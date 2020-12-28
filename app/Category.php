<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subcategories(){
        return $this->hasMany('App\Category', 'parent_id')->where('status',1);
    }

    public function section(){
        return $this->belongsTo('App\Section','section_id')->select('id','section_name');
    }

    public function parentcategory(){
        return $this->belongsTo('App\Category','parent_id')->select('id','category_name');
    }
    public static function categoryDetails($slug)
    {
        $categoryDetails = Category::with('subcategories')->where('slug', $slug)->first()->toArray();

        if($categoryDetails['parent_id']==0){
            $breadcrumbs = '<a href="'.url($categoryDetails['slug']).'">'. $categoryDetails['category_name'].'</a>';
        }else{
            $parentCategory = Category::select('category_name', 'slug')->where('id', $categoryDetails['parent_id'])->first()->toArray();

            $breadcrumbs = '<a href="' . url($parentCategory['slug']) . '">' . $parentCategory['category_name'] . '</a> <li><a href="' . url($categoryDetails['slug']) . '">' . $categoryDetails['category_name'] . '</a></li>';
        }

        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        foreach($categoryDetails['subcategories'] as $key => $subcat){
            $catIds[] = $subcat['id'];
        }
        return array('catIds'=>$catIds, 'categoryDetails'=> $categoryDetails, 'breadcrumbs' => $breadcrumbs);
    }
}
