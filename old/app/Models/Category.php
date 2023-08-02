<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
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
    public function Parent(){
        return $this->belongsTo(Category::class ,'parent_id');
    }
    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function Profiles(){
        return $this->HasMany(Profile::class ,'category_id');
    }
    public function getImageAttribute($image)
    {
        if ($image) {
            return  asset('uploads/Categories').'/'  . $image ;
        }
        return asset('assets/newProfile/images/teams/accordion/img1.png');

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Profile');
            $this->attributes['image'] = $imageFields;
        }
    }
}
