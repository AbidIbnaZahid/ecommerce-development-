@extends('layouts.app_frontend')

@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Shop</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{route('update.cart')}}" method="POST">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $total_amount = 0;
                                    $buy_product =true;
                                @endphp

                                @forelse ($carts as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-15px"
                                                    src="{{asset('uploads/product_thumbnail_photo')}}/{{$cart->relationwithproduct->product_thumbnail_photo}}" alt="" /></a>

                                        </td>
                                        <td class="product-name"><a>{{$cart->relationwithproduct->product_name}}</a>
                                        <p>Color: <span class="badge rounded-circle" style="background-color: {{$cart->relationeithcolor->color_code}}">&nbsp;</span></p>
                                        <p>Size:{{$cart->relationwithsize->size_name}}</p>
                                        </td>
                                        <td class="product-price-cart"><span class="amount">
                                            @if ($cart->relationwithproduct->product_discounted_price)
                                                {{$unit_price = $cart->relationwithproduct->product_discounted_price}}
                                            @else
                                                {{$unit_price = $cart->relationwithproduct->product_regular_price}}
                                            @endif
                                            {{-- {{$cart->relationwithinventories}} --}}

                                        </span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="cart_item[{{$cart->id}}]" value="{{$cart->user_input_amout}}">
                                                @if (get_amount($cart->product_id,$cart->color_id,$cart->size_id) < $cart->user_input_amout)
                                                <span class="badge bg-danger">Out Of Stock</span>
                                                <span class="badge bg-success">Available:{{get_amount($cart->product_id,$cart->color_id,$cart->size_id)}}</span>

                                                @php
                                                    $buy_product=false;
                                                @endphp
                                                @endif
                                            </div>
                                        </td>
                                        <td class="product-subtotal">{{$unit_price * $cart->user_input_amout}}</td>
                                        @php
                                                $total_amount += $unit_price * $cart->user_input_amout
                                        @endphp
                                        <td class="product-remove">
                                            {{-- <a href="#"><i class="fa fa-pencil"></i></a> --}}
                                            <a href="{{route('cart.remove', $cart->id)}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="6">No Product added in cart</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{route('shop')}}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <button type="submit">Update Shopping Cart</button>
                                    <a href="{{route('clear.cart')}}">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select name="country_id" id="country_dropdown" class="email s-email s-wid">
                                            <option>-Select Country-</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->country_id }}">{{ $country->relationwithcountry->nicename }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * City
                                        </label>
                                        <select name="city_id" id="city_dropdown" class="email s-email s-wid">
                                            <option>-Select Country First-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <span id="cuppon_error" class="text-danger"></span>
                                <p>Enter your coupon code if you have one.</p>
                                    <input type="text"   id="coupon_input" />
                                    <button id="apply_coupon" class="cart-btn-2" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total products <span id="total_amount">{{$total_amount}}</span></h5>
                            <h5>(-)Copon <span id="coupon_amount">0</span></h5>
                            <h5>(+)Shipping Charge <span id="shipping_charge">0</span></h5>

                            <h4 class="grand-totall-title">Grand Total <span id="grand_total">{{$total_amount}}</span></h4>
                            @if ($buy_product)
                            <div class="discount-code-wrapper p-0">
                                <div class="discount-code">
                                    <button id="checkout" class="d-none cart-btn-2">Proceed to Checkout</button>
                                </div>
                            </div>

                            @else
                                <div class="alert alert-danger">Please take care of Stock out first!!</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
@endsection

@section('footer_script')
<script>
    $(document).ready(function(){
        $('#country_dropdown').change(function(){
            var country_id = $(this).val();
            // Ajax start
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/get/city',
                data: {country_id:country_id},
                success:function(data){
                    $('#city_dropdown').html(data);
                }
            });
            // Ajax end
             $("#checkout").addClass('d-none')
            $('#shipping_charge').html(0)
             var grand_total = parseInt($('#total_amount').html()) -parseInt($('#coupon_amount').html()) + parseInt($('#shipping_charge').html());
            $('#grand_total').html(grand_total)
        });

        $('#city_dropdown').change(function(){
            $('#shipping_charge').html($(this).val());
            let total_amount = $('#total_amount').html();
            let shipping_charge = $('#shipping_charge').html();
            $('#grand_total').html(parseInt(total_amount)+parseInt(shipping_charge))
            $("#checkout").removeClass('d-none')

            var grand_total = parseInt($('#total_amount').html()) -parseInt($('#coupon_amount').html()) + parseInt($('#shipping_charge').html());
            $('#grand_total').html(grand_total)
        })

        $('#apply_coupon').click(function(){
          var coupon_name =  $('#coupon_input').val()
          var total_amount =parseInt( $('#total_amount').html())
             // Ajax start
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/check/coupon',
                data: {coupon_name:coupon_name,total_amount:total_amount},
                success:function(data){
                    if(data.error){
                        $('#cuppon_error').html(data.error)
                        $('#coupon_input').val("")
                        $('#coupon_amount').html(0)
                        var grand_total = parseInt($('#total_amount').html()) -parseInt($('#coupon_amount').html()) + parseInt($('#shipping_charge').html());
                        $('#grand_total').html(grand_total)
                    }else{
                        $('#coupon_amount').html(data.good)
                         $('#cuppon_error').html("")
                        var grand_total = parseInt($('#total_amount').html()) -parseInt($('#coupon_amount').html()) + parseInt($('#shipping_charge').html());
                        $('#grand_total').html(grand_total)
                    }
                    // $('#city_dropdown').html(data);
                }
            });
            // Ajax end
            if(!coupon_name){
                $('#coupon_amount').html(0)
                  var grand_total = parseInt($('#total_amount').html()) -parseInt($('#coupon_amount').html()) + parseInt($('#shipping_charge').html());
                        $('#grand_total').html(grand_total)
            }
        })

        $('#checkout').click(function(){
            var total_amount = $('#total_amount').html();
            var coupon_amount = $('#coupon_amount').html();
            var shipping_charge = $('#shipping_charge').html();
            var grand_total = $('#grand_total').html();
            var country_id = $('#country_dropdown').val();
            var city_name = $('#city_dropdown').find('option:selected').text();
            var coupon_input=$('#coupon_input').val();
             // Ajax start
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/checkout/redirect',
                data: {total_amount:total_amount,coupon_amount:coupon_amount,shipping_charge:shipping_charge,grand_total:grand_total,country_id:country_id,city_name:city_name},
                success:function(data){
                   window.location.href='checkout'
                }
            });
            // Ajax end

        })

    });
</script>
@endsection
