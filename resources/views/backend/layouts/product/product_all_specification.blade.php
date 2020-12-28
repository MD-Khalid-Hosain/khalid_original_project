@extends('backend.master')
@section('title')
  Product All Specifications
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Product All Specifications</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Normal Tables</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    @if (session('features'))
                        <div class="alert alert-success alert-dismissible" >
                            <strong>{{ session('features') }}</strong>
                            <button type="button" class="close my-3" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-md-12">

                                    <div class="product details">
                                        <h3 class="product-title mb-0">{{ $productDetails['product_name'] }}</h3>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <form name="attributes" id="productAttributes"  action="{{ url('admin/add-shortDescription/'.$productDetails['id']) }}" method="post" >
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $productDetails['id']}}">
                                <input type="hidden" name="category_id" value="{{ $productDetails['category_id'] }}">
                                <input type="hidden" name="category_slug" value="{{ $productDetails['category_slug'] }}">
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label for="meta_description">Title</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="meta_keywords">Product Short Description</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="meta_keywords">Action</label>
                                    </div>
                                </div>
                                    <div class="shortDescriptionAddRemove">
                                    <div class="remove_field1">
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <input type="text" name="short_desc_title[]" placeholder="Enter title" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="product_short_desc[]" placeholder="Enter Short Description" class="form-control"/>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" name="add" class="btn btn-success add_button1">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label for="meta_description">Fetures</label>
                                    </div>
                                </div>
                                <div class="shortSpecificationAddRemove">
                                    <div class="remove_field2">
                                        <div class="row clearfix">
                                            <div class="col-md-8">
                                                <input type="text" name="fetures[]" placeholder="Enter Product Fetures" class="form-control"/></div><div class="col-md-4"> <button type="button" name="add"  class="btn btn-success add_button2">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label for="meta_description">Title</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="meta_keywords">Product Specification</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="meta_keywords">Action</label>
                                    </div>
                                </div>
                                <div class="specificationAddRemove">
                                    <div class="remove_field3">
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <input type="text" name="specification_title[]" placeholder="Enter title" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="product_specification[]" placeholder="Enter product specification" class="form-control"/>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" name="add"  class="btn btn-success add_button3">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label for="meta_description">Title</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="meta_keywords">Product Filtering</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="meta_keywords">Action</label>
                                    </div>
                                </div>
                                <div class="filteringAddRemove">
                                    <div class="remove_field4">
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <input type="text" name="filtering_title[]" placeholder="Enter title" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="product_filtering[]" placeholder="Enter Product Filtering" class="form-control"/>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" name="add" class="btn btn-success add_button4">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#specification">Specification</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#shortDescription">Short Description</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fetures">Fetures</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#filter">Filtering</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- product_filter --}}
                    <div class="card">
                        <div class="body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="specification">
                                    <form name="editSpecification" id="editSpecification" action="{{ url('admin/edit-specification/'.$productDetails['id']) }}" method="post">
                                    @csrf
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productDetails['product_specification'] as $specification)
                                                    <input type="hidden" name="product_specification_id[]" value="{{ $specification['id'] }}">
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><input type="text" name="specification_title[]" class="form-control" value="{{ $specification['specification_title'] }}"></td>
                                                        <td><input type="text" name="product_specification[]" class="form-control" value="{{ $specification['product_specification'] }}"></td>
                                                        <td>
                                                            @if ($specification['status'] == 1)
                                                                <a class="productSpecificationStatus" id="specification-{{ $specification['id'] }}" product_specification_id="{{ $specification['id'] }}" href="javascript:void(0)" style="color:green">Active</a>
                                                                @else
                                                                <a class="productSpecificationStatus" id="specification-{{ $specification['id'] }}" product_specification_id="{{ $specification['id'] }}" href="javascript:void(0)" style="color:red">Inactive</a>
                                                            @endif
                                                            <a @php /* href="{{ url('admin/delete-category-all/'.$category->id) }}" */ @endphp href="javascript:void(0)" class="btn btn-danger btn-sm confirmDelete" record="productSpecification" recordid="{{ $specification['id'] }}"><i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row clearfix">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="shortDescription">
                                    <form name="editShortDesc" id="editShortDesc" action="{{ url('admin/edit-shortDesc/'.$productDetails['id']) }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Title</th>
                                                    <th>Short Description</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productDetails['product_short_description'] as $short_description)
                                                    <input type="hidden" name="product_short_des_id[]" value="{{ $short_description['id'] }}">
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><input type="text" name="short_desc_title[]" class="form-control" value="{{ $short_description['short_desc_title'] }}"></td>
                                                        <td><input type="text" name="product_short_desc[]" class="form-control" value="{{ $short_description['product_short_desc'] }}"></td>
                                                        <td>
                                                            @if ($short_description['status'] == 1)
                                                                <a class="productShortDescStatus" id="shortDesc-{{ $short_description['id'] }}" product_short_des_id="{{ $short_description['id']}}" href="javascript:void(0)" style="color:green">Active</a>
                                                                @else
                                                                <a class="productShortDescStatus" id="shortDesc-{{ $short_description['id']}}" product_short_des_id="{{ $short_description['id'] }}" href="javascript:void(0)" style="color:red">Inactive</a>
                                                            @endif
                                                            <a @php /* href="{{ url('admin/delete-category-all/'.$category->id) }}" */ @endphp href="javascript:void(0)" class="btn btn-danger btn-sm confirmDelete" record="productShortDesc" recordid="{{ $short_description['id'] }}"><i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row clearfix">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="fetures">
                                    <form name="editFetures" id="editFetures" action="{{ url('admin/edit-fetures/'.$productDetails['id']) }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" >
                                                <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Fetures Details</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productDetails['product_fetures'] as $feture)
                                                    <input type="hidden" name="product_feture_id[]" value="{{ $feture['id'] }}">
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><input type="text" name="fetures[]" class="form-control" value="{{ $feture['fetures'] }}"></td>
                                                        <td>
                                                            @if ($feture['status'] == 1)
                                                                <a class="productFeatureStatus" id="feature-{{ $feture['id'] }}" product_feature_id="{{ $feture['id'] }}" href="javascript:void(0)" style="color:green">Active</a>
                                                                @else
                                                                <a class="productFeatureStatus" id="feature-{{ $feture['id'] }}" product_feature_id="{{ $feture['id'] }}" href="javascript:void(0)" style="color:red">Inactive</a>
                                                            @endif
                                                            <a @php /* href="{{ url('admin/delete-category-all/'.$category->id) }}" */ @endphp href="javascript:void(0)" class="btn btn-danger btn-sm confirmDelete" record="productFeature" recordid="{{ $feture['id'] }}"><i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row clearfix">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="filter">
                                    <form name="filter" id="editFilter" action="{{ url('admin/edit-filter/'.$productDetails['id']) }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Title</th>
                                                    <th>Filtering Tag</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productDetails['product_filter'] as $filter_details)
                                                    <input type="hidden" name="product_filter_id[]" value="{{ $filter_details['id'] }}">
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><input type="text" name="filtering_title[]" class="form-control" value="{{ $filter_details['filtering_title'] }}"></td>
                                                        <td><input type="text" name="product_filtering[]" class="form-control" value="{{ $filter_details['product_filtering'] }}"></td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm confirmDelete" record="productFilter" recordid="{{ $filter_details['id']  }}"><i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row clearfix">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_section')
<script src="{{ asset('backend/assets/admin_js/admin_script.js') }}"></script>
@endsection
