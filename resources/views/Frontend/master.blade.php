<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Circle shop - eCommerce HTML5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/assets/images/favicon.ico') }}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap Min Css -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/vendor/bootstrap.min.css') }}">
    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/vendor/font-awesome.min.css') }}">
    <!-- Material Design Font Css -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/vendor/material-design-iconic-font.min.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/vendor/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/plugins/magnific-popup.css') }}">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/plugins/jquery-ui.min.css') }}">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/plugins/plugins.css') }}">
    @yield('header_script')

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css') }}">

</head>

<body>

    <!-- ========================
    Offcanvas Menu Area Start
    ===========================-->
    <div class="offcanvas_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="#"><i class="zmdi zmdi-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div class="welcome_text text-center mb-10">
                            <p><span>Customer Service: </span> (800) 123 456 789</p>
                        </div>
                        <div class="box-right text-center mb-20">
                            <ul>
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
                                            <a href="#"><img src="assets/images/cuntry/2.jpg" alt=""> Francies</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="settings">
                                    <a href="compare.html">Compare (2)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-body">
                            <div class="widget-address text-center mb-20">
                                <p><strong>ADDRESS</strong></p>
                                <p>123 Main Street, Anytown <br> CA 12345 USA.</p>
                                    <p>(800) 123 456 - (800) 123 456.</p>
                            </div>
                        </div>
                        <div class="offcanvas-search-container mb-40">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- Offcanvas Menu Start -->
                        <div class="offcanvas_menu_cover text-left">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                <li><a href="shop-list.html">List View</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="shopping-cart.html">Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="faq.html">FAQs</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Product Types</a>
                                            <ul class="sub-menu">
                                                <li><a href="product-details.html">Product details</a></li>
                                                <li><a href="product-details-external.html">Product external</a></li>
                                                <li><a href="product-details-grouped.html">Product grouped</a></li>
                                                <li><a href="product-details-variable.html">Product variable</a></li>
                                                <li><a href="product-details-bottomtab.html">Tab style - 1</a></li>
                                                <li><a href="product-details-lefttab.html">Tab style - 2</a></li>
                                                <li><a href="product-details-righttab.html">Tab style - 3</a></li>
                                                <li><a href="product-details-stickyleft.html">Product sticky left</a></li>
                                                <li><a href="product-details-stickyright.html">Product sticky right</a></li>
                                                <li><a href="product-details-galleryleft.html">Product leftside Gallery</a></li>
                                                <li><a href="product-details-galleryright.html">Product rightside Gallery</a></li>
                                                <li><a href="product-details-sliderbox.html">Product Sliderbox</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog Grid</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-grid-right-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="blog-grid-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-grid-fullwidth.html">Full Width</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog List</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-list-fullwidth.html">Full Width</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog Single Post</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-details.html">Right Sidebar</a></li>
                                                <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-details-fullwidth.html">Full Width</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Standard Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-fullwidth.html">Full Width</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="product-details.html">Product</a></li>
                                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="faq.html">Frequently Question</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.html"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Offcanvas Menu End -->
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <div class="footer_social">
                                <ul class="d-flex">
                                    <li><a class="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="zmdi zmdi-youtube"></i></a></li>
                                    <li><a class="google" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    <li><a class="linkedin" href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================
    Offcanvas Menu Area End
    ===========================-->

    <!-- =================
    Header Area Start
    =====================-->
    @include('Frontend.partials.header_menu')
    <!-- =================
    Header Area  End
    =====================-->

    <!-- =================
    Dynamic part start
    =====================-->
    @yield('content')

    <!-- =================
    Dynamic part end
    =====================-->

    <!--===================
     footer area start
    ===================-->
    @include('Frontend.partials.footer_part')
    <!--===================
     footer area end
    ===================-->

    <!-- Scroll To Top Start -->
    <a class="scroll-to-top" href=""><i class="fa fa-angle-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- JS
============================================ -->
    <!-- jQuery JS -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <!-- jQuery Migrate JS -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.1.0.min.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.8.0.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('frontend/assets/js/plugins/plugins.js') }}"></script>
    <!-- Jquery ui JS -->
    <script src="{{ asset('frontend/assets/js/plugins/jquery.ui.js') }}"></script>
    <!-- Mailchimp JS -->
    <script src="{{ asset('frontend/assets/js/plugins/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Jquery Magnific Popup JS -->
    <script src="{{ asset('frontend/assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('frontend/assets/js/plugins/slick.min.js') }}"></script>
    <!-- Modal JS -->
    <script src="{{ asset('frontend/assets/js/plugins/modal.min.js') }}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('frontend/assets/js/plugins/sticky-sidebar.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('frontend/assets/js/plugins/countdown.min.js') }}"></script>
    <!-- jQuery Nice Select JS -->
    <script src="{{ asset('frontend/assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <!--custom script-->
    <script src="{{ asset('frontend/assets/js/frontend_script.js') }}"></script>


    @yield('footer_script')

</body>

</html>
