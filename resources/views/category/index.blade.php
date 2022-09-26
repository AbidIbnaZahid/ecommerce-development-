@extends('dashboard.dashboard_master')

@section('page_title')
List Category   
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    View All Category
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>    
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger">
                            {{session('delete')}}
                        </div>    
                    @endif
                    <table class="table table-striped table-inverse table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Category Name</th>
                                <th>Category Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <img src="{{asset('uploads/category_photo')}}/{{$category->category_photo}}" alt="not found">
                                    </td>
                                    <td><a href="{{route('category.show',$category->id)}}" class="btn btn-success">Show Detels</a>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                                    <form class="mt-2" action="{{route('category.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Soft Delete</button>
                                    </form>
                                    <form class="mt-2" action="{{route('category.delete',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hard Delete</button>
                                    </form>
                                    </td> 
                                </tr>
                            @empty
                                No Category Available!!
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection