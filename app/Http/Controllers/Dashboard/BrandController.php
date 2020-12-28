<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function brands(){
        $brands = Brand::get();
        return view('backend.layouts.brand.show_all_brands', compact('brands'));
    }
    public function addEditBrand(Request $request, $id=null){
        if($id==""){
            $title = "Add Brand";
            $brand = new Brand;
            $message = "Brand added successfully !!";
        }else{
            $title = "Edit Brand";
            $brand = Brand::find($id);
            $message = "Edit Updated successfully !!";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            //custom validation
            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages = [
                'name.required' => 'Brand name is required',
                'name.regex' => 'Valid name is required',
            ];
            $this->validate($request, $rules, $customMessages);

            $brand->name = $data['name'];
            $brand->status = 1;
            $brand->save();

            return redirect('admin/brands')->with('success', $message);
        }
        return view('backend.layouts.brand.add_edit_brand', compact('title', 'brand'));
    }

    public function updateBrandStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Brand::where('id', $data['brand_id'])->update(['Status' => $status]);
            return response()->json(['status' => $status, 'brand_id' => $data['brand_id']]);
        }
    }

    public function deleteBrand($id){
        Brand::find($id)->delete();
        $message = "Brand Deleted Successfully !!";
        return back()->with('success', $message);
    }


}
