<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CategoryImage extends Model
{
    use HasFactory;
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_name;
        } else {
            return $this->en_name;
        }
    }
    public function Profile(){
        return $this->belongsTo(Profile::class,'profile_id')->withDefault([
            'name'=>'',
            'profile_url'=>'',
            'id'=>0

        ]);
    }
}

