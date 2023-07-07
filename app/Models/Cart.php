<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class Cart extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
