<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\appoinment;


class location extends Model
{
    use HasFactory;

    public function appoinment()
    {
      return $this->hasMany(appoinment::class);
    }
}
