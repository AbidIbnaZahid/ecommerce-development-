@extends('layouts.app_frontend')

@section('content')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Products</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container zoom-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/zoom-image/1.jpg"
                                    alt="">
                            </div>
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/zoom-image/2.jpg"
                                    alt="">
                            </div>
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/zoom-image/3.jpg"
                                    alt="">
                            </div>
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/zoom-image/4.jpg"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container zoom-thumbs mt-3 mb-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/small-image/1.jpg"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/small-image/2.jpg"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/small-image/3.jpg"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{asset('fontend')}}/images/product-image/small-image/4.jpg"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{$product_detals->product_name}}</h2>
                        <h6>Stock: <span id="stock_amount">-</span></h6>
                        <div class="pricing-meta">
                            <ul>
                                 @if ($product_detals->product_discounted_price)
                                    <span style="text-decoration: line-through" class="new">{{$product_detals->product_regular_price}}</span>
                                <span class="new badge bg-info">{{$product_detals->product_discounted_price}}</span>
                                @else
                                    <span class="new">{{$product_detals->product_regular_price}}</span>
                                @endif

                            </ul>
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="read-review"><a class="reviews" href="#">( 5 Customer Review )</a></span>
                        </div>
                        <input type="hidden" name="customer_color_choose" id="customer_color_choose">
                        <input type="hidden" name="customer_size_choose" id="customer_size_choose">
                        <input type="hidden" name="login_status" id="login_status" value=@auth "true" @else "false" @endauth>
                        <div class="pro-details-color-info d-flex align-items-center">
                            <span>Color</span>
                            <div class="pro-details-color">
                                <ul>
                                    @forelse ($colors as $color)
                                    @if ($color->relationeithcolor->color_name == 'N/A')
                                        <li>
                                            <span id="{{$color->color_id}}" class="color_option badge bg-info">No Color</span>
                                        </li>
                                    @else

                                    <li><a class="color_option" id="{{$color->color_id}}" style="background-color:{{$color->relationeithcolor->color_code}}"  ></a></li>
                                    @endif
                                    @empty
                                    No color Available
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="pro-details-size-info d-flex align-items-center">
                            <span>Size</span>
                            <div class="pro-details-size">
                                <ul id="pro-details-size-ul">
                                    <select class="form-control" id="size_dropdown">
                                        <option value="">Please choose color first</option>
                                    </select>
                                </ul>
                            </div>
                        </div>
                        <p class="m-0">{{$product_detals->product_short_description}}</p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input id="user_input_amout" class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <button class="add-cart" id="add_to_cart"> Add To
                                    Cart</button>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-compare">
                                <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                            </div>
                        </div>
                        <div class="pro-details-sku-info pro-details-same-style  d-flex">
                            <span>SKU: </span>
                            <ul class="d-flex">
                                <li>
                                    {{$product_detals->product_sku}}
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Category: </span>
                            <ul class="d-flex">
                                <li>
                                    {{$product_detals->relationwithcategory->category_name}}
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Sub Category: </span>
                            <ul class="d-flex">
                                <li>
                                     {{$product_detals->relationwithsubcategory->subcategory_name}}
                                </li>
                            </ul>

                        </div>
                        <div class="pro-details-social-info pro-details-same-style d-flex">
                            <span>Share: </span>
                            <ul class="d-flex">
                                <li>
                                    {{-- <a href="https://www.facebook.com/sharer.php?u={{url()->full()}}"><i class="fa fa-facebook"></i></a> --}}
                                    <a href="http://www.facebook.com/sharer/sharer.php?u={{url()->full()}}&t={{$product_detals->product_name}}" target="_blank" class="share-popup"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                     <a href="http://www.twitter.com/intent/tweet?url={{url()->full()}}&text={{$product_detals->product_name}}" target="_blank" class="share-popup"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details2">Information</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                    <a data-bs-toggle="tab" href="#des-details3">Reviews (02)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper text-start">
                            <ul>
                                <li><span>Weight</span> {{$product_detals->product_weight}}</li>
                                <li><span>Dimensions</span>{{$product_detals->product_dimensions}}</li>
                                <li><span>Materials</span> {{$product_detals->product_materials}}</li>
                                <li><span>Other Info</span> {{$product_detals->product_other_info}}</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>
                                {!!$product_detals->product_long_description!!}
                            </p>
                        </div>

                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="review-wrapper">
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="{{asset('fontend')}}/images/review-image/1.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                    cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                    euismod vehicula. Phasellus quam nisi, congue id nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review child-review">
                                        <div class="review-img">
                                            <img src="{{asset('fontend')}}/images/review-image/2.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                    cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                    euismod vehicula.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                        <form action="#">
                                            <div class="star-box">
                                                <span>Your rating:</span>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input placeholder="Name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input placeholder="Email" type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="Your Review" placeholder="Message"></textarea>
                                                        <button class="btn btn-primary btn-hover-color-primary "
                                                            type="submit" value="Submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->

    <!-- Related product Area Start -->
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Related Products({{$related_products->count()}})</h2>
                    </div>
                </div>
            </div>
            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                <div class="new-product-wrapper swiper-wrapper">
                    @forelse ($related_products as $product)
                        <div class="new-product-item swiper-slide">
                        <!-- Single Prodect -->
                        @include('parts/product_thumb')
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-danger">
                         No Related product to show!!
                        </div>
                    </div>

                    @endforelse
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related product Area End -->
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('.color_option').click(function(){
            var product_id ="{{$product_detals->id}}";
            var color_id = $(this).attr('id');

            $('#customer_color_choose').val(color_id);

            // Ajax start
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/get/size',
                data: {product_id:product_id, color_id:color_id},
                success:function(data){
                    // $('#pro-details-size-ul').html(data)
                    $('#size_dropdown').html(data)
                }
            });
            // Ajax end
         });

         $('#size_dropdown').change(function(){
            $('#customer_size_choose').val($(this).val())
            var product_id ="{{$product_detals->id}}";
            var color_id = $('#customer_color_choose').val();
            var size_id = $('#customer_size_choose').val();

            // Ajax start
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/get/stock',
                data: {product_id:product_id, color_id:color_id ,size_id:size_id},
                success:function(data){
                    $('#stock_amount').html(data)

                }
            });
            // Ajax end
         });
         $('#add_to_cart').click(function(){
             if($('#login_status').val() == 'false'){
                Swal.fire({
                    title: 'You are not Logged in!',
                    text: "Please login First!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Login Now'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="{{route('customer')}}"
                    }
                })
             }else{
                if($('#customer_color_choose').val()){
                    if($('#customer_size_choose').val()){
                        var stock_amount = $('#stock_amount').html();
                        var user_input_amout = $('#user_input_amout').val();
                        if(parseInt(user_input_amout) > parseInt(stock_amount)){
                            Swal.fire(
                            'Stock Not Available!',
                            '',
                            'info'
                            )
                        }else{
                            var product_id ="{{$product_detals->id}}";
                            var color_id = $('#customer_color_choose').val();
                            var size_id = $('#customer_size_choose').val();
                            var user_input_amout = $('#user_input_amout').val();
                            var user_id = "{{auth()->id()}}";

                            // Ajax start
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type:'POST',
                                url:'/add/to/cart',
                                data: {product_id:product_id, color_id:color_id ,size_id:size_id, user_input_amout:user_input_amout, user_id:user_id},
                                success:function(data){
                                    Swal.fire(
                                    'Added to Cart!',
                                    '',
                                    'success'
                                    )
                                }
                            });
                            // Ajax end

                        }
                    }else{
                        Swal.fire(
                        'Size Choose Please!',
                        '',
                        'info'
                        )
                    }
                }else{
                    Swal.fire(
                    'Color Choose First!',
                    '',
                    'warning'
                    )
                }
             }
         })
    });
</script>
@endsection
