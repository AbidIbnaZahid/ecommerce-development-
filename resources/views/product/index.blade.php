@extends('dashboard.dashboard_master')

@section('page_title')
List Category
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    View All Product
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
                    <table class="table  table-inverse table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Product Photo</th>
                                <th>Product Sku</th>
                                {{-- <th>Product Barcode</th>
                                <th>Product QR Code</th> --}}
                                <th>Product Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td>
                                        <p>{{$product->relationwithcategory->category_name}}</p>
                                        {{-- {{App\Models\Category::find($product->category_id)->category_name}} --}}
                                    </td>
                                    <td>
                                        <p>{{$product->relationwithsubcategory->subcategory_name}}</p>
                                        {{-- {{App\Models\Subcategory::find($product->category_id)->subcategory_name}} --}}
                                    </td>
                                        <td><img src="{{asset('uploads/product_thumbnail_photo')}}/{{$product->product_thumbnail_photo}}" alt=""></td>
                                        <td>{{$product->product_sku}}</td>
                                        {{-- <td>{!! DNS1D::getBarcodeSVG($product->product_sku, 'C39')!!}</td>
                                        <td>{!! DNS2D::getBarcodeHTML($product->product_sku, 'QRCODE',5,5,'red')!!}</td> --}}
                                        <td>{{$product->product_regular_price}}</td>
                                        <td> <a href="{{route('product.edit',$product->id)}}" class="btn btn-info">Edit</a>
                                         <a href="{{route('product.inventory',$product->id)}}" class="btn btn-info">Inventory</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
