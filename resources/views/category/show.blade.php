@extends('dashboard.dashboard_master')

@section('page_title')
Category Detels   
@endsection

@section('content')
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Category Detels
                    </div>
                    <div class="card-body">
                        <h5>Serial No: {{$category->id}}</h5>
                        <h2>Category Name: {{$category->category_name}}</h2>
                        <h4>Create at: {{$category->created_at->diffForHumans()}}</h4>
                        <a href="{{route('category.index')}}" class="btn btn-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
@endsection