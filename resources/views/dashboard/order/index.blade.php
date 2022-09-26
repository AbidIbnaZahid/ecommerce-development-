@extends('dashboard.dashboard_master')
@section('page_title')
    Order Detals
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Info</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th class="width80">#</th>
                                <th>Customer Name</th>
                                <th>Country Name</th>
                                <th>City Name</th>
                                <th>Customer Address</th>
                                <th>Payment Status</th>
                                <th>Delivary Status</th>
                                <th>Grand Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_summeries as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_country }}</td>
                                    <td>{{ $order->customer_city }}</td>
                                    <td>{{ $order->customer_address }}</td>
                                    <td>
                                        <span class="badge light badge-success"> {{ $order->payment_status }}</span>
                                    </td>
                                    <td>
                                        <span class="badge light badge-danger"> {{ $order->delivary_status }}</span>
                                    </td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td>
                                        <div class="dropdown" style="display: inline-block">
                                            <button type=" button" class="btn btn-success light sharp"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                    </g>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                <a class="dropdown-item"
                                                    href="{{ route('delevary.status.update', ['order_id' => $order->id, 'delevary_status' => 'processing']) }}">Processing</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('delevary.status.update', ['order_id' => $order->id, 'delevary_status' => 'on_going']) }}">On
                                                    Going</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('delevary.status.update', ['order_id' => $order->id, 'delevary_status' => 'delivered']) }}">Delivered</a>
                                            </div>
                                        </div>
                                        <a href="{{ route('order.detals', $order->id) }}"
                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                class="fa fa-info myicon"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
