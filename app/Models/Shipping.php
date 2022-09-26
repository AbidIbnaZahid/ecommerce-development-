<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    function relationwithcountry()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
