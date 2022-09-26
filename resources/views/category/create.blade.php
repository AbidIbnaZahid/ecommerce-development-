@extends('dashboard.dashboard_master')
@section('page_title')
Add Category 
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add Category
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="onclick">Enter Category Name:</label>
                        <input type="text" name="category_name" id="onclick"  class="   @if (session('success')) is-valid @endif  @error('category_name') is-invalid  @enderror form-control">
                        @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>         
                    <div class="form-group">
                        <label for="onclick">Category Photo:</label>
                        <input type="file" name="category_photo" class="form-control">
                        <small class="text-warning">Please Upload a photo with width 300px and height 200px</small>
                        @error('category_photo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>         
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add</button>
                    </div>         
                </form>
            </div>
        </div>
    </div>
</div>
@endsection