<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caryear extends Model
{
    use HasFactory;
    public function brand()
    {
       return $this->belongsTo(Brand::class);
    }

    public function car()
    {
       return $this->belongsTo(car::class);
    }
}
