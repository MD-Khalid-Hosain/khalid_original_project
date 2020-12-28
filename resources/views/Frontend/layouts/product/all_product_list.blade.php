@extends('Frontend.master')

@section('content')

  <!--=====================
    Breadcrumb Aera Start
    =========================-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li>
                                <h1><a href="{{ url('/') }}">Home</a></h1>
                            </li>
                            <li> <?php echo $categoryDetails['breadcrumbs'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================
    Breadcrumb Aera End
    =========================-->

    <!--======================
    Shop area Start
    ==========================-->
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar-widget mt-50">
                        <div class="widget_inner widget-background mt-50">
                            <div class="widget_list widget_filter">
                                <div class="sidebar-title">
                                    <h4 class="title-shop">Filter by Price</h4>
                                </div>
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount" />
                                </form>
                            </div>
                            @foreach ($leftFiltering as $filterItem)
                                 <div class="widget_list widget_categories mt-20">
                                <div class="faq-accordion">
                                    <div id="accordion">
                                        <div class="card actives">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Brand
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" >
                                                <div class="card-body">
                                                   <ul>
                                                        <li>
                                                            <input type="checkbox">
                                                            <a href="#">Black (6)</a>
                                                            <span class="checkmark"></span>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox">
                                                            <a href="#"> Blue (8)</a>
                                                            <span class="checkmark"></span>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox">
                                                            <a href="#">Brown (10)</a>
                                                            <span class="checkmark"></span>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox">
                                                            <a href="#"> Green (6)</a>
                                                            <span class="checkmark"></span>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox">
                                                            <a href="#">Pink (4)</a>
                                                            <span class="checkmark"></span>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox">
                                                            <a href="#">White (2)</a>
                                                            <span class="checkmark"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!-- Shop Banner Start -->
                        <div class="single-banner text-center mt-50 mb-30">
                            <a href="#"><img src="assets/images/banner/shop-banner-2.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <!-- Shop Banner End -->
                    </aside>
                </div>
                <div class="col-lg-9 order-first order-lg-last">
                    <!-- Shop Banner Start -->
                    <div class="single-banner mt-50 mb-50">
                        <a href="#"><img src="assets/images/banner/shop-banner-1.jpg" alt="" class="img-fluid"></a>
                    </div>
                    <!-- Shop Banner End -->
                    <!-- Shop Toolbar Start -->
                    <div class="toolbar-shop mb-50">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" class="btn-grid-3"></button>
                            <button data-role="grid_list" class="btn-list active"></button>
                        </div>
                        <div class="page-amount">
                            <p>{{ $categoryProductCount }} Products are avilable in this category</p>
                        </div>
                        <form name="sortform" id="sortform" >
                            <div>
                                <select name="sort" id="sort" class="form-control">
                                    <option value="">Sort By</option>
                                    <option value="latest_products" @if (isset($_GET['sort']) && $_GET['sort']=="latest_products") selected @endif>Latest Products</option>
                                    <option value="product_name_a_z" @if (isset($_GET['sort']) && $_GET['sort']=="product_name_a_z") selected @endif>Product Name A - Z</option>
                                    <option value="product_name_z_a" @if (isset($_GET['sort']) && $_GET['sort']=="product_name_z_a") selected @endif>Product Name Z - A</option>
                                    <option value="lowest_to_highest" @if (isset($_GET['sort']) && $_GET['sort']=="lowest_to_highest") selected @endif>Lowest to Highest</option>
                                    <option value="highest_to_highest" @if (isset($_GET['sort']) && $_GET['sort']=="highest_to_highest") selected @endif>Highest to Lowest</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <!-- Shop Toolbar End -->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop-wrapper grid_list">
                        @foreach ($categoryProducts as $product)
                            <div class="col-12 mb-20">
                            <!-- Single-Product-Start -->
                            <div class="item-product pt-0">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{{ asset('backend/uploads/product_main_image/'.$product['main_image']) }}" alt="" class="img-fluid">
                                    </a>
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-toggle="modal" data-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                        <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="product-details.html">{{ $product['product_name'] }}</a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">${{ $product['product_price'] }}</span>
                                    </div>
                                    <div class="cart">
                                        <div class="add-to-cart">
                                            <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-list-caption align-items-center">
                                    <div class="product-name">
                                        <a href="product-details.html">{{ $product['product_name'] }}</a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                     <div class="product-tax mb-20">
                                        <ul>
                                            @foreach (App\ProductFetures::where('product_id', $product['id'])->get() as $features)
                                            <li>&diams; {{ $features['fetures'] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="text-available">
                                        <p><strong>Brand:</strong><span> {{ $product['brand']['name'] }}</span></p>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">৳{{ $product['product_price'] }}</span>
                                    </div>
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-toggle="modal" data-target="#product{{ $product['id'] }}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                        <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                    </div>
                                    <div class="cart-list-button">
                                        <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single-Product-End -->
                        </div>
                        <!-- modal area start-->
                            <div class="modal fade" id="product{{ $product['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                                        </button>
                                        <div class="modal_body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <!-- Product Zoom Image start -->
                                                        <div class="product-slider-container arrow-center text-center">
                                                            <div class="product-item">
                                                                <img src="{{ asset('backend/uploads/product_main_image') }}/{{ $product['main_image'] }}" class="img-fluid" alt="" />
                                                            </div>
                                                            @foreach (json_decode($product['product_multiple_image'],true) as $item)
                                                            <div class="product-item">
                                                                <img src="{{ asset('backend/uploads/product/'.$item) }}" class="img-fluid" alt="" />
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                        <!-- Product Zoom Image End -->
                                                        <!-- Product Thumb Zoom Image Start -->
                                                        <div class="product-details-thumbnail arrow-center text-center">
                                                            <div class="product-item-thumb">
                                                                <img src="{{ asset('backend/uploads/product_main_image') }}/{{ $product['main_image'] }}" class="img-fluid" alt="" />
                                                            </div>
                                                            @foreach (json_decode($product['product_multiple_image'],true) as $item)
                                                            <div class="product-item-thumb">
                                                                <img src="{{ asset('backend/uploads/product/'.$item) }}" class="img-fluid" alt="" />
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <!-- Product Summery Start -->
                                                        <div class="product-summery mt-50">
                                                            <div class="product-head">
                                                                <h1 class="product-title">{{ $product['product_name'] }}</h1>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="regular-price">৳{{ $product['product_price'] }}</span>
                                                            </div>
                                                            <div class="product-description">
                                                                <ul>
                                                                    @foreach (App\ProductFetures::where('product_id', $product['id'])->get() as $features)
                                                                    <li>&diams; {{ $features['fetures'] }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="product-tax mb-20">
                                                                <ul>
                                                                    <li><span><strong>Ex Tax :</strong>£60.24</span></li>
                                                                    <li><span><strong>Brands :</strong>Canon</span></li>
                                                                    <li><span><strong>Product Code :</strong>Digital</span></li>
                                                                    <li><span><strong>Reward Points :</strong>200</span></li>
                                                                    <li><span><strong>Availability :</strong>In Stock</span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-buttons grid_list">
                                                                <div class="action-link">
                                                                    <a href="#" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                                    <button class="btn-secondary">Add To Cart</button>
                                                                    <a href="#" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-meta">
                                                                <div class="desc-content">
                                                                    <div class="social_sharing d-flex">
                                                                        <h5>share this post:</h5>
                                                                        <ul>
                                                                            <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                                            <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                                            <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                                            <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                                            <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Product Summery End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal area end-->
                        @endforeach
                    </div>
                    <!-- Shop Wrapper End -->
                    <!-- Shop Toolbar Start -->
                    <div class="toolbar-shop toolbar-bottom">
                        <div class="page-amount">
                            <p>Showing 1-{{ count($categoryProducts) }} of {{ $categoryProductCount }} results</p>
                        </div>
                        <div>
                            <ul>
                                @if (isset($_GET['sort']) && !empty($_GET['sort']))
                                    <li>{{ $categoryProducts->appends(['sort' => $_GET['sort']])->links() }}</li>
                                @else
                                    <li>{{ $categoryProducts->links() }}</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <!-- Shop Toolbar End -->

                    <!-- Category Description Start -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="faq-content">
                                    <div class="faq-desc">
                                        {!! $categoryDetails['categoryDetails']['description'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Category Description End -->
                </div>
            </div>
        </div>
    </div>
    <!--======================
    Shop area End
    ==========================-->

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/images/product/product-details/product-details-1.jpg" alt="" class="img-fluid"></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/images/product/product-details/product-details-2.jpg" alt="" class="img-fluid"></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/images/product/product-details/product-details-3.jpg" alt="" class="img-fluid"></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/images/product/product-details/product-details-4.jpg" alt="" class="img-fluid"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/images/product/product-details/product-thumb-1.jpg" alt="" class="img-fluid"></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/images/product/product-details/product-thumb-2.jpg" alt="" class="img-fluid"></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/images/product/product-details/product-thumb-3.jpg" alt="" class="img-fluid"></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/images/product/product-details/product-thumb-4.jpg" alt="" class="img-fluid"></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!-- Product Summery Start -->
                                <div class="product-summery mt-50">
                                    <div class="product-head">
                                        <h1 class="product-title">Porro quisquam eget feugiat pretium</h1>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">$30.00</span>
                                    </div>
                                    <div class="product-description">
                                        <p>Porro first 4K UHD Camcorder, the GX10 has a compact and portable design that delivers outstanding video quality with remarkable detail. With a combination of incredible features and functionality, the GX10 is the ideal camcorder for aspiring filmmakers.</p>
                                    </div>
                                    <div class="product-tax mb-20">
                                        <ul>
                                            <li><span><strong>Ex Tax :</strong>£60.24</span></li>
                                            <li><span><strong>Brands :</strong>Canon</span></li>
                                            <li><span><strong>Product Code :</strong>Digital</span></li>
                                            <li><span><strong>Reward Points :</strong>200</span></li>
                                            <li><span><strong>Availability :</strong>In Stock</span></li>
                                        </ul>
                                    </div>
                                    <div class="product-buttons grid_list">
                                        <div class="action-link">
                                            <a href="#" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                            <button class="btn-secondary">Add To Cart</button>
                                            <a href="#" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-meta">
                                        <div class="desc-content">
                                            <div class="social_sharing d-flex">
                                                <h5>share this post:</h5>
                                                <ul>
                                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Summery End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal area end-->

@endsection
