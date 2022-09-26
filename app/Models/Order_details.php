<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_details extends Model
{
    use HasFactory, SoftDeletes;
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
}
