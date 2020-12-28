<?php
 use App\Section;
    $sections = Section::sections();
?>
 <!-- =================
    Header Area Start
    =====================-->
    <div class="header-area">
        <!-- Header Top Start -->
        <div class="header-top full-border">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="header-top-left">
                            <p><span>Customer Service: </span> (800) 123 456 789</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="box-right">
                            <ul>
                                <li class="settings">
                                    <a href="#">Compare (2)</a>
                                </li>
                                <li class="settings">
                                    <a href="#" class="drop-toggle">
                                        <span>USD $</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="box-dropdown drop-dropdown">
                                        <li><a href="#">EUR €</a></li>
                                        <li><a href="#">USD $</a></li>
                                    </ul>
                                </li>
                                <li class="settings">
                                    <a href="#" class="drop-toggle">
                                        <img src="assets/images/cuntry/1.jpg" alt="">
                                        English
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="box-dropdown drop-dropdown">
                                        <li>
                                            <a href="#"><img src="assets/images/cuntry/1.jpg" alt=""> English</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="assets/images/cuntry/2.jpg" alt=""> Francis</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="settings">
                                    <a href="#" class="drop-toggle">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="box-dropdown drop-dropdown">
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Sign In</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top End -->
        <!-- Header Middle Start -->
        <div class="header-middle space-40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-6">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/pos-circle-logo.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-6">
                        <div class="header-middle-inner">
                            <div class="search-container">
                                <form action="#">
                                    <div class="top-cat">
                                        <select class="select-option" name="select" id="category2">
                                            <option >All categories</option>
                                            @foreach ($sections as $section)
                                                <option class="font-weight-bold">{{ $section['section_name'] }}</option>
                                                @foreach ($section['categories'] as $category)
                                                    <option class="pl-3" value="{{ $category['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $category['category_name'] }}</option>
                                                    @foreach ($category['subcategories'] as $subcategory)
                                                         <option class="pl-5" value="{{ $subcategory['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $subcategory['category_name'] }}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search_box">
                                        <input class="header-search" placeholder="Enter your search key ..." type="text">
                                        <button class="header-search-button" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="blockcart">
                                <a href="#" class="drop-toggle">
                                    <img src="{{ asset('frontend/assets/images/cart/cart.png') }}" alt="" class="img-fluid">
                                    <span class="my-cart">My Cart</span>
                                    <span class="count">2</span>
                                    <span class="total-item">$200.00</span>
                                </a>
                                <div class="cart-dropdown drop-dropdown">
                                    <ul>
                                        <li class="mini-cart-details">
                                            <div class="innr-crt-img">
                                                <img src="{{ asset('frontend/assets/images/cart/ear-headphones.jpg') }}" alt="">
                                                <span>1x</span>
                                            </div>
                                            <div class="innr-crt-content">
                                                <span class="product-name">
                                                <a href="#">SonicFuel Wireless Over-Ear Headphones </a>
                                            </span>
                                                <span class="product-price">$32.30</span>
                                                <span class="product-size">Size:  S</span>
                                            </div>
                                        </li>
                                        <li class="mini-cart-details mb-30">
                                            <div class="innr-crt-img">
                                                <img src="assets/images/cart/720-degree-cameras-dual.jpg" alt="">
                                                <span>1x</span>
                                            </div>
                                            <div class="innr-crt-content">
                                                <span class="product-name">
                                                <a href="#">720 Degree Panoramic HD 360.. </a>
                                            </span>
                                                <span class="product-price">$29.00</span>
                                                <span class="product-size">Dimension:  40cm X 60cm</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="subtotal-text">Subtotal</span>
                                            <span class="subtotal-price">$61.30</span>
                                        </li>
                                        <li>
                                            <span class="subtotal-text">Shipping</span>
                                            <span class="subtotal-price">$40.20</span>
                                        </li>
                                        <li>
                                            <span class="subtotal-text">Taxes</span>
                                            <span class="subtotal-price">$10.07</span>
                                        </li>
                                        <li>
                                            <span class="subtotal-text">Total</span>
                                            <span class="subtotal-price">$111.57</span>
                                        </li>
                                    </ul>
                                    <div class="checkout-cart">
                                        <a href="checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Middle End -->
        <!-- Header Bottom Start -->
        <div class="header-menu header-bottom-area theme-bg sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <!-- Category Menu Start -->
                        <div class="categoryes-menu-bar">
                            <div class="categoryes-menu-btn category-toggle">
                                <div class="float-left">
                                    <a href="#">Build Your Desktop</a>
                                </div>
                                <div class="float-right">
                                    <i class="fa fa-desktop"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Category Menu End -->
                    </div>
                    <div class="col-lg-10">
                        <!-- Main Menu Start -->
                        <div class="header-menu add-sticky">
                            <div class="sticky-container">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/images/logo/pos-circle-logo.png" alt="" class="img-fluid"></a>
                                </div>
                                <nav class="main-menu" >
                                    <ul>
                                        @foreach ($sections  as $section)
                                        <li>
                                            <a href="#">{{ $section['section_name'] }} @if (count($section['categories'] ) > 0)<i class="fa fa-angle-down"></i>@endif</a>
                                            @if (count($section['categories'] ) > 0)
                                            <ul class="dropdown dropdown-width">
                                                @foreach ($section['categories'] as $category)
                                                <li>
                                                    <a href="{{ $category['slug'] }}">{{ $category['category_name'] }} @if(count($category['subcategories']) >0)<i class="fa fa-angle-right float-right"></i>@endif</a>
                                                   @if(count($category['subcategories']) >0)
                                                    <ul class="sub-dropdown dropdown dropdown-width">
                                                        @foreach ($category['subcategories'] as $subcategory)
                                                        <li><a href="{{ $subcategory['slug'] }}">{{ $subcategory['category_name'] }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Main Menu End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom End  -->
    </div>
    <!-- =================
    Header Area  End
    =====================-->
