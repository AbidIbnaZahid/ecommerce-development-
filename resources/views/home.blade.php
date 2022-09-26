@extends('dashboard.dashboard_master')
@section('page_title')
Dashboard 
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="fa fa-list"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Category</p>
                            <h3 class="text-white">{{$toatl_category}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="fa fa-list-ol"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Subcategory</p>
                            <h3 class="text-white">{{$toatl_subcategory}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-diamond"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">User</p>
                            <h3 class="text-white">{{$total_users}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Product</p>
                            <h3 class="text-white">{{$toatl_product}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection