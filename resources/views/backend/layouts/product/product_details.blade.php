@extends('backend.master')
@section('title')
  Product Details
@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Product Details</h2>
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
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-12">
                                    <div class="preview preview-pic tab-content">
                                        <div class="tab-pane active" id="main_image{{ $productDetails['id'] }}"><img src="{{ asset('backend/uploads/product_main_image') }}/{{ $productDetails['main_image'] }}" class="img-fluid" alt="" /></div>
                                        @php
                                            $flag=0;
                                        @endphp
                                        @foreach ($multiple_images as $item)
                                        <div class="tab-pane" id="multiple{{ $flag }}"><img src="{{ asset('backend/uploads/product/'.$item) }}" class="img-fluid" alt=""/></div>
                                        @php
                                            $flag++;
                                        @endphp
                                        @endforeach
                                    </div>
                                    <ul class="preview thumbnail nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#main_image{{ $productDetails['id']  }}"><img src="{{ asset('backend/uploads/product_main_image') }}/{{ $productDetails['main_image'] }}" alt=""/></a></li>
                                        @php
                                            $flag = 0;
                                        @endphp
                                        @foreach ($multiple_images as $item)
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#multiple{{ $flag }}"><img src="{{ asset('backend/uploads/product/'.$item) }}" alt=""/></a></li>
                                        @php
                                            $flag++;
                                        @endphp
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-12">
                                    <div class="product details">
                                        <h3 class="product-title mb-0">{{ $productDetails['product_name'] }}</h3>
                                        <h5 class="price mt-0">Current Price: <span class="col-amber">${{ $productDetails['product_price'] }}</span></h5>
                                        <hr>
                                        <p class="product-description">
                                            <table>
                                                @foreach ($productDetails['product_short_description'] as $short_description)
                                                <tr>
                                                    <th><li><span class="font-weight-bold pr-5">{{ $short_description['short_desc_title'] }}</span></li></th>
                                                    <td>{{ $short_description['product_short_desc'] }}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </p>
                                        <p class="vote"><h5 class="font-weight-bold">Fetures</h5>
                                            <ul>
                                                @foreach ($productDetails['product_fetures'] as $feture)
                                                <li>
                                                    <td>{{ $feture['fetures'] }}</td>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#specification">Specification</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#description">Description</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="specification">
                                   <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($productDetails['product_specification'] as $specification)
                                                    <tr>
                                                        <td><code class="w3-codespan">{{ $specification['specification_title'] }}</code></td>
                                                        <td>{{ $specification['product_specification'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="description">
                                    {!! $productDetails['product_description'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
