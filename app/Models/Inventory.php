<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Inventory extends Model
{
    use HasFactory;

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
};
