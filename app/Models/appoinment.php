<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\location;
use App\Models\brand;
use App\Models\year;
use App\Models\Car;
class appoinment extends Model
{
    use HasFactory;


    public function location()
    {
       return $this->belongsTo(location::class);
    }
    public function brand()
    {
       return $this->belongsTo(brand::class);
    }
    public function year()
    {
       return $this->belongsTo(year::class);
    }
    public function car()
    {
       return $this->belongsTo(car::class);
    }
}
