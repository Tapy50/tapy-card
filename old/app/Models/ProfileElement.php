<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ProfileElement extends Model
{
    use HasFactory;
    protected $appends = ['title'];
    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }

    public function getValueAttribute($image)
    {
        if ($this->type == 'image') {
            return  asset('uploads/files') . '/' . $image ;
        }

        return $image;

    }

    public function setValueAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'files');
            $this->attributes['value'] = $imageFields;
        }else{
            $this->attributes['value'] = $image;

        }


    }

    public function category(){
        return  $this->belongsTo(CategoryImage::class ,'category_id')->withDefault([
            'name'=>'',
        ]);
    }
}
