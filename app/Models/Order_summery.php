<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_summery extends Model
{
    use HasFactory, SoftDeletes;

    public function relationWithOrder_detils()
    {
        return $this->hasMany(order_details::class, 'oreder_summary_id', 'id');
    }
}
