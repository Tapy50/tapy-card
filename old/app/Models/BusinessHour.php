<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;

    public function getStartTimeAttribute($time)
    {
         return \Carbon\Carbon::parse($time)->format('H:i');
    }
    public function getEndTimeAttribute($time)
    {
        return \Carbon\Carbon::parse($time)->format('H:i');
    }
}
