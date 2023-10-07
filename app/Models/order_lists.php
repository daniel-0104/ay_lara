<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_lists extends Model
{
    use HasFactory;

    protected $fillable = ['user_name','product_id','qty','total','order_code'];
}
