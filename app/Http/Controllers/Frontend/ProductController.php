<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use App\Category;
use App\ProductAttributes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function listing($slug){
        $categoryCount = Category::where(['slug'=>$slug, 'status'=>1])->count();
        if($categoryCount > 0){
            $categoryDetails = Category::categoryDetails($slug);
            // echo "<pre>"; print_r($categoryDetails); die;
            $categoryProducts = Product::whereIn('category_id', $categoryDetails['catIds'])->where('status',1)->with('brand')->with('productShortDescription')->with('productSpecification')->with('productFetures')->with('productFilter');

            //if Sort option selected by user
            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort']== "latest_products"){
                    $categoryProducts->orderBy('id','Desc');
                }elseif ($_GET['sort'] == "product_name_a_z") {
                    $categoryProducts->orderBy('product_name', 'Asc');
                }elseif ($_GET['sort'] == "product_name_z_a") {
                    $categoryProducts->orderBy('product_name', 'Desc');
                }elseif ($_GET['sort'] == "lowest_to_highest") {
                    $categoryProducts->orderBy('product_price', 'Asc');
                }elseif ($_GET['sort'] == "highest_to_highest") {
                    $categoryProducts->orderBy('product_price', 'Desc');
                }
            }else{
                $categoryProducts->orderBy('id', 'Asc');
            }
            $categoryProductCount = $categoryProducts->count();
            $categoryProducts = $categoryProducts->paginate(1);

            // $leftFiltering = ProductAttributes::with('parentFiltering')->get();
            // $leftFiltering = json_decode(json_encode($leftFiltering, true),true);


            // echo "<pre>"; print_r($leftFiltering); die;
            // return $categoryProductCount ; die;
            return view('Frontend.layouts.product.all_product_list', compact('categoryDetails', 'categoryProducts', 'categoryProductCount', 'leftFiltering'));

        }else{
            abort(404);
        }
    }

}
