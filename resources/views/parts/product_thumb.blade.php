
<!-- Single Prodect -->
<div class="product">
    <div class="thumb">
        <a href="{{route('product.details',$product->slug)}}" class="image">
            <img src="{{asset('uploads/product_thumbnail_photo')}}/{{$product->product_thumbnail_photo}}" alt="No Image Found"/>
        </a>
        <span class="badges">
                @if ($product->product_discounted_price)
                <span class="sale">-{{ round(100-($product->product_discounted_price/$product->product_regular_price)*100,2)}}</span>
                @endif
                @if ($product->created_at->diffInDays(\Carbon\Carbon::now())<=4)
                <span class="new">New</span>
                @endif
            
        </span>
        <div class="actions">
            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                    class="pe-7s-like"></i></a>
            
        </div>
        <a href="{{route('product.details',$product->slug)}}" title="Add To Cart" class=" add-to-cart">Details</a>
    </div>
    <div class="content">
        <span class="ratings">
            <span class="rating-wrap">
                <span class="star" style="width: 100%"></span>
            </span>
            <span class="rating-num">( 5 Review )</span>
        </span>
        <h5 class="title">
            <a href="{{route('product.details',$product->slug)}}">{{$product->product_name}}
            </a>
        </h5>
        <span class="price">
            @if ($product->product_discounted_price)
                <span style="text-decoration: line-through" class="new">{{$product->product_regular_price}}</span>
            <span class="new badge bg-info">{{$product->product_discounted_price}}</span>  
            @else
                <span class="new">{{$product->product_regular_price}}</span>
            @endif
            
        </span>
    </div>
</div>
