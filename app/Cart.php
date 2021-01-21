<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Cart extends Model
{
    protected $fillable = [
        'user_id','product_id', 'quantity'
    ];
}
