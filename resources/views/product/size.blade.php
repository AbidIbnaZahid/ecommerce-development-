@extends('dashboard.dashboard_master')

@section('page_title')
Add Inventory
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Add Color
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('poduct.size.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="onclick">Enter Size Name:</label>
                        <input type="text" name="size_name" id="onclick"  class="   @if (session('success')) is-valid @endif  @error('size_name') is-invalid  @enderror form-control">
                        @error('size_name')
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
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                View Color
            </div>
            <table class="table table-striped table-bordered ">
                <thead class="thead-inverse">
                    <tr>
                        <th>Size Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($sizes as $size)
                         <tr>
                            <td>{{$size->size_name}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-danger">No Size Avaliable!!</td>
                            </tr>
                        @endforelse

                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
