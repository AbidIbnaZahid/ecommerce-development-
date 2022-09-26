@extends('dashboard.dashboard_master')

@section('page_title')
List Subategory   
@endsection

@section('content')
     <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        View All Subcategory
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
                                    <th>Sub-Category Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @forelse ($category_ingroup as $category)
                                   <tr class="text-center">
                                       <td colspan="5">
                                           <b class="text-info">{{App\Models\Category::find($category->category_id)->category_name}}</b>
                                       </td>
                                   </tr>
                                        @foreach (App\Models\Subcategory::where('category_id',$category->category_id)->get() as $subcategory)
                                            <tr>
                                                <td>{{$subcategory->subcategory_name}}</td>
                                            </tr>
                                        @endforeach
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