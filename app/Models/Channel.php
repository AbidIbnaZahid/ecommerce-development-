<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['channel_name'];
}
