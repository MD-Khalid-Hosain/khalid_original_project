@extends('backend.master')
@section('dashboard_active')
active open
@endsection
@section('dashboard_toggled')
    toggled waves-effect waves-block
@endsection
@section('content')
     <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Stater Page</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                        <li class="breadcrumb-item active">Stater Page</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-blue">
                            <h4 class="m-t-0 m-b-0">2,048</h4>
                            <p class="m-b-0">Total Leads</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-purple">
                            <h4 class="m-t-0 m-b-0">521</h4>
                            <p class="m-b-0 ">Total Connections</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-green">
                            <h4 class="m-t-0 m-b-0">73</h4>
                            <p class="m-b-0 ">Articles</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body xl-pink">
                            <h4 class="m-t-0 m-b-0">15</h4>
                            <p class="m-b-0">Categories</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
