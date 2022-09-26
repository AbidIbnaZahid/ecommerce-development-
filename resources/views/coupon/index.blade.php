@extends('dashboard.dashboard_master')

@section('page_title')
Coupon
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Add Coupon
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('coupon.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="onclick">Coupon Name</label>
                        <input type="text" name="coupon_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="onclick">Coupon Type</label>
                        <select name="coupon_type" id="" class="form-control">
                            <option value="">-Select Type of Coupon First-</option>
                            <option value="1">Percentage(%)</option>
                            <option value="2">Flat(Tk)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="onclick">Coupon Amount</label>
                        <input type="number" name="coupon_amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="onclick">Coupon Limit</label>
                        <input type="number" name="coupon_limit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="onclick">Coupon Validity</label>
                        <input type="date" name="coupon_validity" class="form-control" min="{{ \Carbon\Carbon::today()->format("Y-m-d") }}">
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
                View Coupon Chart
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse table-bordeded">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Country Name</th>
                            <th>Percentage/Flate</th>
                            <th>Coupon Limit</th>
                            <th>Coupon Validity</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->coupon_name }}</td>
                                <td>{{ $coupon->coupon_amount }}{{ $coupon->coupon_type==1?'%':'TK' }}</td>
                                <td>{{ $coupon->coupon_limit }}</td>
                                <td>{{ $coupon->coupon_validity }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
