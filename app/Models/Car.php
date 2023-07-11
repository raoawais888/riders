<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Caryear;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function brand()
    {
       return $this->belongsTo(Brand::class);
    }
    public function caryear()
    {
       return $this->belongsTo(Caryear::class);
    }
}
