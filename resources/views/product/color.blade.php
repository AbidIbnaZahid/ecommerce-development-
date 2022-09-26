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
                <form action="{{route('poduct.color.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="onclick">Enter Color Name:</label>
                        <input type="text" name="color_name" id="onclick"  class="   @if (session('success')) is-valid @endif  @error('color_name') is-invalid  @enderror form-control">
                        @error('color_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="onclick">Select Color:</label>
                        <input type="color" name="color_code" id="onclick" value="#9900ff" class="@if (session('success')) is-valid @endif  @error('color_code') is-invalid  @enderror ">
                        @error('color_code')
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
                        <th>Color Name</th>
                        <th>Color Code</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($colors as $color)
                         <tr>
                            <td>{{$color->color_name}}</td>
                            <td> <span class="badge rounded-circle" style="background-color: {{$color->color_code}}">&nbsp;</span></td>
                        </tr>
                        @empty
                            No Color Avaliable!!
                        @endforelse

                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
