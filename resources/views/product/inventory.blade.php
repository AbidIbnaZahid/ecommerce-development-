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
                <form action="{{route('product.inventory.post',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="">Color Name:</label>
                    @foreach ($colors as $color)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="color_id" id="" value="{{$color->id}}">
                        {{$color->color_name}} <span class="badge" style="background-color: {{$color->color_code}}">&nbsp;&nbsp;&nbsp;</span>
                        </label>
                    </div>
                    @endforeach

                    <div class="form-group mt-3">
                        <label for="">Size Name:</label>
                        <select name="size_id" id="" class="form-control">
                            <option value="">-Select One Size-</option>
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="onclick">Quantity</label>
                        <input type="number"  class="form-control" name="quantity" id="onclick" value="#9900ff" class="@if (session('success')) is-valid @endif  @error('color_code') is-invalid  @enderror ">
                        @error('color_code')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="onclick">Special Price</label>
                        <input type="number"  class="form-control" name="specialprice" placeholder="Exceptional" id="onclick" value="#9900ff" class="@if (session('success')) is-valid @endif  @error('color_code') is-invalid  @enderror ">
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
                <h4>Product Name:{{$product->product_name}}</h4>
            </div>
            <table class="table table-striped table-bordered ">
                <thead class="thead-inverse">
                    <tr>
                        <th>Color Name</th>
                        <th>Size Name</th>
                        <th>Quantity</th>
                        <th>Market price</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                         <tr>
                            <td>{{$inventory->relationeithcolor->color_name}}
                                <span style="background-color: {{$inventory->relationeithcolor->color_code }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                            </td>
                            <td>{{$inventory->relationwithsize->size_name}}</td>
                            <td>{{$inventory->quantity}}</td>
                            <td>
                                @if ($inventory->specialprice)
                                    {{$inventory->quantity * $inventory->specialprice}}
                                @else
                                     {{$inventory->quantity * $inventory->relationwithproduct->product_regular_price}}
                                @endif

                            </td>

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-center">
                                <b>Total</b>
                            </td>
                            <td>
                                {{$inventories->sum('quantity')}}
                            </td>
                            <td>
                                {{$product->product_regular_price * $inventories->sum('quantity')}}
                            </td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
