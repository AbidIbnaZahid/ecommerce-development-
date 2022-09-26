<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_thumbnail_photo'];

    function relationwithcategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    function relationwithsubcategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subcategory_id');
    }
}
