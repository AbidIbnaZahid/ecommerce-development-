@extends('dashboard.dashboard_master')
@section('page_title')
    Order Detals
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Detals</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <table id="example" class="display min-w850 dataTable table-bordered" role="grid"
                            aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 246.672px;">
                                        Product Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 390.484px;">
                                        Item Name (Size & Color) </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 190.25px;">SKQ
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Age: activate to sort column ascending" style="width: 90.125px;">
                                        Quentity</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending"
                                        style="width: 168.406px;">Price</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Salary: activate to sort column ascending" style="width: 152.062px;">
                                        Total Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->relationWithOrder_detils as $key => $item)
                                    <tr class="odd" role="row">
                                        <td class="sorting_1">
                                            <img width="100"
                                                src="{{ asset('uploads/product_thumbnail_photo') }}/{{ $item->relationwithproduct->product_thumbnail_photo }}"
                                                alt="">
                                        </td>
                                        <td>
                                            {{ $item->relationwithproduct->product_name }}
                                            <br>
                                            <small class="text-success"> Size:
                                                {{ $item->relationwithsize->size_name }}</small>
                                            <small class="text-danger">Color:
                                                {{ $item->relationeithcolor->color_name }}</span>
                                        </td>
                                        <td>
                                            {{ $item->relationwithproduct->slug }}
                                        </td>
                                        <td>
                                            {{ $item->user_input_amout }}
                                        </td>

                                        <td>
                                            {{ $item->relationwithproduct->product_discounted_price * $item->user_input_amout }}
                                        </td>
                                        <td>
                                            {{ $item->relationwithproduct->product_discounted_price * $item->user_input_amout + $order->shipping_charge }}
                                        </td>

                                    </tr>
                                @endforeach
                                <tr class="bg-info">
                                    <td colspan="5" class="text-right">Grand Total</td>
                                    <td colspan="5" class="text-center">
                                        {{ $order->grand_total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
