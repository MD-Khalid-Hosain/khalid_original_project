@extends('Frontend.master')

@section('content')
    <!--=====================
    slider area start
    =========================-->
    <div class="slider_section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-8">
                    <div class="slider_area slider-one mt-30">
                        <!-- Single Slider Start -->
                        <div class="single_slider">
                            <img src="{{ asset('frontend/assets/images/slider/9th-GEN-DESKTOP-DELL-1.jpg') }}" alt="" class="img-fluid">
                            <div class="slider_content color_one">
                                <h5>The Hottest <br> Trend</h5>
                                <h2>Laptop <br> Tablets Outlet</h2>
                                <div class="pt-des">
                                    <p><span>25%</span>Starting at <span>$340.00</span></p>
                                </div>
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                        <!-- Single Slider End -->
                        <!-- Single Slider Start -->
                        <div class="single_slider">
                            <img src="{{ asset('frontend/assets/images/slider/slider-2.png') }}" alt="" class="img-fluid">
                            <div class="slider_content color_two">
                                <h5>The Hottest <br> Trend</h5>
                                <h2>Cellphone <br> Smartphone Not 2</h2>
                                <div class="pt-des">
                                    <p><span>35%</span>Starting at <span>$120.00</span></p>
                                </div>
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                        <!-- Single Slider End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--======================
     slider area End
    ==========================-->
@endsection
