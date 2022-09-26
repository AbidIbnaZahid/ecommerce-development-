@extends('dashboard.dashboard_master')
@section('page_title')
 Edit Category   
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Edit Category
            </div>
            <div class="card-body">
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Category Photo</label>
                        <img src="{{asset('uploads/category_photo')}}/{{$category->category_photo}}" alt="Not Found">
                    </div>
                      <div class="form-group">
                        <label for="">New Category Image</label>
                        <input type="file" name="category_photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection