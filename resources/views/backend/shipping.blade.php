@extends('dashboard.dashboard_master')

@section('page_title')
List Category
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Add Category
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('shipping.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="onclick">Country Name:</label>
                       <select name="country_id" class="form-control" id="">
                           <option value="">-Select Country Name-</option>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                           @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="onclick">City Name</label>
                        <input type="text" name="city_name" class="form-control">
                        @error('city_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="onclick">Shipping Charge</label>
                        <input type="number" name="shipping_charge" class="form-control">
                        @error('city_name')
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
                View Shipping Chart
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse table-bordeded">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Country Name</th>
                            <th>City Name</th>
                            <th>Shipping Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($shppings as $shpping)
                            <tr>
                                <td>{{ $shpping->relationwithcountry->name }}</td>
                                <td>{{ $shpping->city_name }}</td>
                                <td>{{ $shpping->shipping_charge }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
