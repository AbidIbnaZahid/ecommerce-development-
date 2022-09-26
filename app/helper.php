<?php

use App\Models\Cart;
use App\Models\Inventory;

function get_amount($product_id, $color_id, $size_id)
{
    return Inventory::where([
        'product_id' => $product_id,
        'color_id' => $color_id,
        'size_id' => $size_id
    ])->first()->quantity;
}

function total_cart_product()
{
    echo Cart::where('user_id', auth()->id())->count();
}
function cart_products()
{
    return Cart::where('user_id', auth()->id())->get();
}
function relationeithcolor()
{
    return $this->hasOne(Color::class, 'id', 'color_id');
}
function relationwithsize()
{
    return $this->hasOne(Size::class, 'id', 'size_id');
}
function relationwithproduct()
{
    return $this->hasOne(Product::class, 'id', 'product_id');
}
