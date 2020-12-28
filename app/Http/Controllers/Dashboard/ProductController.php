<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use App\Product;
use App\Section;
use App\Category;
use App\ProductFetures;
use App\ProductAttributes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\ProductSpecification;
use App\ProductShortDescreption;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /*========================================================
    ||              showing all product list                ||
    ==========================================================*/
    public function products(){
        $products = Product::with(['category'=>function($query){ $query->select('id','category_name');},
        'section' => function ($query) {$query->select('id', 'section_name');}])->get();
        return view('backend.layouts.product.products',compact('products'));
    }
    /*========================================================
    ||           Product active or inactive status          ||
    ==========================================================*/
    public function updateProductStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_id' => $data['product_id']]);
        }
    }
    /*========================================================
    ||       add product and upload with images start       ||
    ==========================================================*/

    /*========================================================
    ||         product add form and pass categories start   ||
    ==========================================================*/
    public function addProduct()
    {
        $title = "Add Product";
        //Section with Categories and SubCategories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories), true);
        $brands = Brand::where('status', 1)->get();
        $brands = json_decode(json_encode($brands, true), true);
        return view('backend.layouts.product.add_product', compact('title', 'categories', 'brands'));
    }
    /*========================================================
    ||         product add form and pass categories end     ||
    ==========================================================*/
    public function addProductPost(ProductRequest $request)
    {
        // multiple photo upload start
        $images = [];
        if ($request->hasFile('product_multiple_image')) {
            $flag = 0;
            foreach ($request->file('product_multiple_image') as $file) {
                //get image extension
                $new_product_img_name = rand(111, 99999) . $flag . "." . $file->extension();
                //set image location
                $product_img_location = base_path('public/backend/uploads/product/' . $new_product_img_name);
                //Upload the image
                Image::make($file)->resize(480, 480)->save($product_img_location);
                //update the image name in database
                $images[] = $new_product_img_name;

                $flag++;
            }
        }
        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'category_slug' => Category::find($request->category_id)->slug,
            'section_id' => Category::find($request->category_id)->section_id,
            'product_multiple_image' => json_encode($images),
            'product_description' => $request->product_description,
            'brand_id' => $request->brand_id,
            'slug' => Str::slug($request->product_name),
            'product_price' => $request->product_price,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => 1,
        ]);

        // main photo upload start
        $uploaded_main_product_img = $request->file('main_image');
        $product_main_img_name = $product_id . "." . $uploaded_main_product_img->extension();
        $product_main_img_location = base_path('public/backend/uploads/product_main_image/' . $product_main_img_name);
        Image::make($uploaded_main_product_img)->resize(480, 480)->save($product_main_img_location);

        Product::find($product_id)->update([
            'main_image' => $product_main_img_name
        ]);

        return redirect('/admin/products')->with('success', "Product Added Successfully !!");
    }
    /*========================================================
    ||       add product and upload with images end         ||
    ==========================================================*/

    /*==============================================================
    ||                 single product view start                  ||
    ================================================================*/
    public function ProductDetails($id){
        $productDetails = Product::with('productShortDescription')->with('productSpecification')->with('productFetures')->find($id);
        $productDetails = json_decode(json_encode($productDetails, true), true);

        $multiple_images = json_decode($productDetails['product_multiple_image']);
        return view('backend.layouts.product.product_details', compact('productDetails', 'multiple_images'));
    }
    /*==============================================================
    ||                 single product view end                    ||
    ================================================================*/

    /*==============================================================
    ||         product edit form and pass categories start        ||
    ================================================================*/

    public function ProductEdit($id){
        //Section with Categories and SubCategories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories), true);
        $product_edit = Product::find($id);
        $brands = Brand::where('status', 1)->get();
        $brands = json_decode(json_encode($brands, true), true);
        return view('backend.layouts.product.product_edit', compact('product_edit', 'categories', 'brands'));
    }
    /*==============================================================
    ||         product edit form and pass categories end          ||
    ================================================================*/

    /*==============================================================
    ||                   product update start                     ||
    ================================================================*/
    public function ProductUpdate(Request $request){

        $product = Product::find($request->product_id);
        $multiple_images = json_decode($product->product_multiple_image);
        //main photo upload start
        if(!empty($request->hasFile('main_image'))){
            $uploaded_main_product_img = $request->file('main_image');
            $product_main_img_name = $request->product_id . "." . $uploaded_main_product_img->extension();
            $product_main_img_location = base_path('public/backend/uploads/product_main_image/' . $product_main_img_name);
            Image::make($uploaded_main_product_img)->resize(480, 480)->save($product_main_img_location);

            Product::find($request->product_id)->update([
                'main_image' => $product_main_img_name
            ]);
        }
        // multiple photo upload start
        if (!empty($request->hasFile('product_multiple_image'))){

            //delete previous multiple images
            foreach ($multiple_images as $image) {
                @unlink(base_path() . '/public/backend/uploads/product/' . $image);
            }
            $images = [];

                $flag = 0;
                foreach ($request->file('product_multiple_image') as $file) {
                    //get image extension
                    $new_product_img_name = rand(111, 99999) . $flag . "." . $file->extension();
                    //set image location
                    $product_img_location = base_path('public/backend/uploads/product/' . $new_product_img_name);
                    //Upload the image
                    Image::make($file)->resize(480, 480)->save($product_img_location);
                    //update the image name in database
                    $images[] = $new_product_img_name;

                    $flag++;
                }
                Product::find($request->product_id)->update(['product_multiple_image' => json_encode($images)]);
            }
        // multiple photo upload end

        Product::find($request->product_id)->update([
        'product_name'=> $request->product_name,
        'category_id'=> $request->category_id,
        'category_slug'=>Category::find($request->category_id)->slug,
        'section_id' => Category::find($request->category_id)->section_id,
        'product_description'=> $request->product_description,
        'brand_id' => $request->brand_id,
        'product_price'=> $request->product_price,
        'slug'=> Str::slug($request->product_name),
        'meta_title'=> $request->meta_title,
        'meta_description'=> $request->meta_description,
        'meta_keywords'=> $request->meta_keywords,

        ]);

        $message = 'Product Updated Successfully !!';
        return back()->with('success', $message);
    }
    /*==============================================================
    ||                   product update end                       ||
    ================================================================*/

    /*==============================================================
    ||  product and image delete using jquery sweet alert start   ||
    ================================================================*/
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $multiple_images = json_decode($product->product_multiple_image);

        $productSpecification = ProductSpecification::where('product_id', $id)->get();
        $productSpecification = json_decode(json_encode($productSpecification, true), true);

        $productFeature = ProductFetures::where('product_id', $id)->get();;
        $productFeature = json_decode(json_encode($productFeature, true), true);

        $productFilter = ProductAttributes::where('product_id', $id)->get();;
        $productFilter = json_decode(json_encode($productFilter, true), true);

        $productShortDesc = ProductShortDescreption::where('product_id', $id)->get();;
        $productShortDesc = json_decode(json_encode($productShortDesc, true), true);

        $multiple_images = json_decode($product->product_multiple_image);

        if (file_exists(base_path() . '/public/backend/uploads/product_main_image/' . $product->main_image)) {
            @unlink(base_path() . '/public/backend/uploads/product_main_image/' . $product->main_image);
            foreach ($multiple_images as $image) {
                @unlink(base_path() . '/public/backend/uploads/product/' . $image);
            }
            foreach($productShortDesc as $value){
                ProductShortDescreption::where('product_id', $value['product_id'])->delete();
            }
            foreach ($productFilter as $value) {
                ProductAttributes::where('product_id', $value['product_id'])->delete();
            }
            foreach ($productFeature as $value) {
                ProductFetures::where('product_id', $value['product_id'])->delete();
            }
            foreach ($productSpecification as $value) {
                ProductSpecification::where('product_id', $value['product_id'])->delete();
            }
            $product->delete();
            $message = "Product Delete Successfully !!";
            return back()->with('success', $message);
        }
    }
    /*==============================================================
    ||  product and image delete using jquery sweet alert end     ||
    ================================================================*/

    /*=======================================================================
    ||add product attributes like short desc, features, specification start||
    ========================================================================*/
    public function addShortDescription(Request $request, $id){

        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['short_desc_title'] as $key=>$value){
                if(!empty($value)){
                    $short_description = new ProductShortDescreption;
                    $short_description->product_id = $id;
                    $short_description->short_desc_title = $data['short_desc_title'][$key];
                    $short_description->product_short_desc = $data['product_short_desc'][$key];
                    $short_description->status = 1;
                    $short_description->save();
                }
            }

            foreach ($data['fetures'] as $key => $value) {
                if (!empty($value)) {
                    $product_fetures = new ProductFetures;
                    $product_fetures->product_id = $id;
                    $product_fetures->fetures = $data['fetures'][$key];
                    $product_fetures->status = 1;
                    $product_fetures->save();
                }
            }

            foreach ($data['specification_title'] as $key => $value) {
                if (!empty($value)) {
                    $product_spefication = new ProductSpecification;
                    $product_spefication->product_id = $id;
                    $product_spefication->specification_title = $data['specification_title'][$key];
                    $product_spefication->product_specification = $data['product_specification'][$key];
                    $product_spefication->status = 1;
                    $product_spefication->save();
                }
            }
            foreach ($data['filtering_title'] as $key => $value) {
                if (!empty($value)) {
                    $product_attributes = new ProductAttributes;
                    $product_attributes->product_id = $id;
                    $product_attributes->category_id = $data['category_id'];
                    $product_attributes->category_slug = $data['category_slug'];
                    $product_attributes->filtering_title = $data['filtering_title'][$key];
                    $product_attributes->product_filtering = $data['product_filtering'][$key];
                    $product_attributes->save();
                }
            }
            $message = 'Product Attributes added Successfully !!';
            return back()->with('features', $message);

        }

        $productDetails = Product::select('id','product_name','category_id','category_slug')->with('productShortDescription')->with('productSpecification')->with('productFetures')->with('productFilter')->find($id);
        $productDetails = json_decode(json_encode($productDetails, true), true);


        return view('backend.layouts.product.product_all_specification', compact('productDetails'));
    }
    /*=======================================================================
    ||add product attributes like short desc, features, specification end  ||
    ========================================================================*/

    /*==============================================================
    ||         product specification active or inactive start     ||
    ================================================================*/

    public function updateProductSpecificationStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductSpecification::where('id', $data['product_specification_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_specification_id' => $data['product_specification_id']]);
        }
    }
    /*==============================================================
    ||         product specification active or inactive end       ||
    ================================================================*/

    /*==============================================================
    ||         product feature active or inactive start           ||
    ================================================================*/
    public function updateProductFeatureStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductFetures::where('id', $data['product_feature_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_feature_id' => $data['product_feature_id']]);
        }
    }
    /*==============================================================
    ||           product feature active or inactive end           ||
    ================================================================*/
    /*==============================================================
    ||       product short description active or inactive start   ||
    ================================================================*/
    public function updateProductShortDesceStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductShortDescreption::where('id', $data['product_short_des_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_short_des_id' => $data['product_short_des_id']]);
        }
    }
    /*==============================================================
    ||       product short description active or inactive end     ||
    ================================================================*/

    /*==============================================================
    ||              product specification edit start              ||
    ================================================================*/
    public function editSpecification(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['product_specification_id'] as $key =>$productSpecification){
                if(!empty($productSpecification)){
                    ProductSpecification::where(['id'=>$data['product_specification_id'][$key]])->update([
                        'specification_title'=>$data['specification_title'][$key],
                        'product_specification'=>$data['product_specification'][$key]
                    ]);
                }
            }
            $message = 'Product Specification Updated Successfully !!';
            return back()->with('features', $message);
        }
    }
    /*==============================================================
    ||              product specification edit end                ||
    ================================================================*/

    /*==============================================================
    ||              product short description edit start          ||
    ================================================================*/
    public function editShortDesc(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['product_short_des_id'] as $key => $productShortDesc) {
                if (!empty($productShortDesc)) {
                    ProductShortDescreption::where(['id' => $data['product_short_des_id'][$key]])->update([
                        'short_desc_title' => $data['short_desc_title'][$key],
                        'product_short_desc' => $data['product_short_desc'][$key]
                    ]);
                }
            }
            $message = 'Product Short Description Updated Successfully !!';
            return back()->with('features', $message);
        }
    }
    /*==============================================================
    ||               product short description edit end           ||
    ================================================================*/
    /*==============================================================
    ||                 product feature edit start                 ||
    ================================================================*/
    public function editFeture(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['product_feture_id'] as $key => $productFeture) {
                if (!empty($productFeture)) {
                    ProductFetures::where(['id' => $data['product_feture_id'][$key]])->update([
                        'fetures' => $data['fetures'][$key]
                    ]);
                }
            }
            $message = 'Product Feature Updated Successfully !!';
            return back()->with('features', $message);
        }
    }
    /*==============================================================
    ||                     product feature edit end               ||
    ================================================================*/
    /*==============================================================
    ||                 product filtering edit start               ||
    ================================================================*/
    public function editFilter(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['product_filter_id'] as $key => $productFilter) {
                if (!empty($productFilter)) {
                    ProductAttributes::where(['id' => $data['product_filter_id'][$key]])->update([
                        'filtering_title' => $data['filtering_title'][$key],
                        'product_filtering' => $data['product_filtering'][$key]
                    ]);
                }
            }
            $message = 'Product Filter Updated Successfully !!';
            return back()->with('features', $message);
        }
    }
    /*==============================================================
    ||                     product filtering edit end             ||
    ================================================================*/

    /*=======================================================================
    ||   product short description delete using jquery sweet alert start   ||
    ========================================================================*/
    public function deleteProductShortDesc($id)
    {
        $productShortDesc = ProductShortDescreption::find($id);

        $productShortDesc->delete();
        $message = "Product Short Description Deleted Successfully !!";
        return back()->with('features', $message);
    }
    /*=======================================================================
    ||   product short description delete using jquery sweet alert end     ||
    ========================================================================*/


    /*=======================================================================
    ||   product Specification delete using jquery sweet alert start       ||
    ========================================================================*/
    public function deleteProductSpecification($id)
    {
        $productSpecification = ProductSpecification::find($id);

        $productSpecification->delete();
        $message = "Specification Deleted Successfully !!";
        return back()->with('features', $message);
    }
    /*=======================================================================
    ||   product Specification delete using jquery sweet alert end         ||
    ========================================================================*/

    /*=================================================================
    ||   product Feature delete using jquery sweet alert start       ||
    ====================================================================*/
    public function deleteProductFeature($id)
    {
        $productFeature = ProductFetures::find($id);

        $productFeature->delete();
        $message = "Feature Deleted Successfully !!";
        return back()->with('features', $message);
    }
    /*===============================================================
    ||   product Feature delete using jquery sweet alert end       ||
    =================================================================*/
    /*=================================================================
    ||   product Filter delete using jquery sweet alert start       ||
    ====================================================================*/
    public function deleteProductFilter($id)
    {
        $productFilter = ProductAttributes::find($id);

        $productFilter->delete();
        $message = "Product Filter Deleted Successfully !!";
        return back()->with('features', $message);
    }
    /*===============================================================
    ||   product Filter delete using jquery sweet alert end       ||
    =================================================================*/


}
