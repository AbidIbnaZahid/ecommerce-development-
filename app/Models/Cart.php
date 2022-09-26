<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_input_amout'];

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
