@extends('backend.master')
@section('header_section')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/select2.css') }}" />
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">



@endsection
@section('content')
      <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Catalogues</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Examples</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @if (session('delete_success'))
                        <div class="alert alert-success alert-dismissible" >
                            <strong>{{ session('delete_success') }}</strong>
                            <button type="button" class="close my-3" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="header">
                            <h2><strong>{{ $title }}</strong></h2>
                        </div>
                        <div class="body">
                            <form name="productForm" id="productForm" action="{{ url('admin/post-product') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="product_name">Product Name</label><span class="required">*</span>
                                        <div class="form-group">
                                            <input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name') }}">
                                            @error ('product_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="category_id">Select Category</label><span class="required">*</span>
                                        <select name="category_id" id="category_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                            <option >---Select Category---</option>
                                            @foreach ($categories as $sections)
                                                <option class="font-weight-bold" disabled>{{ $sections['section_name'] }}</option>
                                                @foreach ($sections['categories'] as $category)
                                                    <option class="pl-3" value="{{ $category['id'] }}">--&nbsp;{{ $category['category_name'] }}</option>
                                                    @foreach ($category['subcategories'] as $subcategory)
                                                         <option class="pl-5" value="{{ $subcategory['id'] }}">&nbsp;&nbsp;-&nbsp;{{ $subcategory['category_name'] }}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error ('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="product_description">Product Description</label><span class="required">*</span>
                                        <div class="form-group">
                                            <textarea name="product_description" id="ckeditor" class="form-control"  rows="9">{{ old('product_description') }}</textarea>
                                            @error ('product_description')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="brand_id">Select Brnad</label><span class="required">*</span>
                                      <div class="form-group" style="text-align:center">
                                        <select name="brand_id" id="brand_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                            <option value="0">--Select Brand--</option>
                                            @foreach ($brands as $brandDetails)
                                            <option value="{{ $brandDetails['id'] }}">{{ $brandDetails['name'] }}</option>
                                            @endforeach
                                        </select>
                                         @error ('brand_id')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <label for="main_image">Product Image</label><span class="required">*</span>
                                      <div class="form-group" style="text-align:center">
                                             <input type="file" name="main_image"  class="form-control" id="main_image">
                                             @error ('main_image')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                        <label for="main_image" class="mt-5">Product Multiple Image</label><span class="required">*</span>
                                        <div class="form-group" style="text-align:center">
                                            <input type="file" name="product_multiple_image[]" multiple  class="form-control" id="main_image">
                                            @error ('product_multiple_image')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                         <label for="product_price">Product Price</label><span class="required">*</span>
                                        <div class="form-group" style="text-align:center">
                                            <input type="text" name="product_price" multiple  class="form-control" placeholder="Product Price" id="product_price" value="{{ old('product_price') }}">
                                            @error ('product_price')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="meta_title">Meta Title</label>
                                        <div class="form-group">
                                            <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ old('meta_title') }}">
                                            @error ('meta_title')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="meta_description">Meta Description</label>
                                        <div class="form-group">
                                            <textarea name="meta_description" class="form-control" id="meta_description"  rows="6">{{ old('meta_description') }}</textarea>
                                             @error ('meta_description')
                                                <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <div class="form-group">
                                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}" data-role="tagsinput" class="form-control"/>
                                            @error ('meta_keywords')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_section')
<script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->
<script src="{{ asset('backend/assets/js/pages/forms/advanced-form-elements.js') }}"></script>
<script src="{{ asset('backend/assets/admin_js/admin_script.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->
<script src="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> <!-- Bootstrap Tags Input Plugin Js -->
@endsection
