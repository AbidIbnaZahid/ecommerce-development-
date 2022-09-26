@extends('dashboard.dashboard_master')
@section('page_title')
Add Sub Category 
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add Sub Category
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('subcategory.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="onclick">Category Name:</label>
                        <select name="category_id" class="form-control">
                            <option value="9">-Select Category name-</option>
                            @foreach ($categories as $category)
                                
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                            
                        </select>
                        @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>         
                    <div class="form-group">
                        <label for="onclick">Enter Category Name:</label>
                        <input type="text" name="subcategory_name" id="onclick"  class="   @if (session('success')) is-valid @endif  @error('category_name') is-invalid  @enderror form-control">
                        @error('category_name')
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