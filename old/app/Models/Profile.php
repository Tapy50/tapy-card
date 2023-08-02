<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Profile extends Model
{
    use HasFactory;

    protected $appends = ['about','first_name','last_name','job_title','company','title','designation','sub_title'];
    protected $table = 'profiles';


    public function User(){
        return $this->belongsTo(User::class,'user_id')->withDefault([
            'id'=>0,
            'name'=>''
        ]);
    }
    public function Card(){
        return $this->HasOne(Card::class,'profile_id')->withDefault([
            'id'=>0,
            'serial'=>''
        ]);
    }
    public function HasCard(){
        return $this->HasOne(Card::class,'profile_id');
    }
    public function ElementsSocial(){
        return $this->HasMany(ProfileElement::class,'profile_id')->where('type','social')->where('is_active','active');
    }
    public function business_hours(){
        return $this->HasMany(BusinessHour::class,'profile_id')->where('is_active','active');
    }
    public function ElementsContact(){
        return $this->HasMany(ProfileElement::class,'profile_id')->orderBy('sub_type','desc')->where('type','contact')->where('is_active','active');
    }
    public function ElementsLinks(){
        return $this->HasMany(ProfileElement::class,'profile_id')->where('type','links')->where('is_active','active');
    }
    public function ElementsImage(){
        return $this->HasMany(ProfileElement::class,'profile_id')->where('type','image')->where('is_active','active')->with('category');
    }
    public function CategoryImage(){
        return $this->HasMany(CategoryImage::class,'profile_id');
    }
    public function ElementsVideo(){
        return $this->HasMany(ProfileElement::class,'profile_id')->where('type','video')->where('is_active','active');
    }
    public function AppointmentsRelation(){
        return $this->HasMany(AppointmentsRelation::class,'profile_id')->where('is_deleted',0);
    }
    public function Appointments(){
        return $this->HasMany(Appointment::class,'profile_id');
    }
    public function AppointmentsِApi(){
        return $this->HasMany(Appointment::class,'profile_id')->where('is_active','active');
    }

    public function Payments(){
        return $this->HasMany(Payment::class,'profile_id');
    }
    public function PaymentsApi(){
        return $this->HasMany(Payment::class,'profile_id')->where('is_active','active');
    }
    public function reviews(){
        return $this->HasMany(Review::class,'profile_id');
    }

    public function Categories(){
        return $this->HasMany(Category::class,'profile_id')->whereNull('parent_id');
    }
    public function Department(){
        return $this->belongsTo(Category::class,'category_id')->withDefault([
            'ar_title'=>'',
            'en_title'=>'',
        ]);
    }
    public function company(){
        return $this->belongsTo(User::class,'company_id');
    }
    public function getImageAttribute($image)
    {
        if ($image) {
            return  asset('uploads/Profile').'/'  . $image ;
        }

        return asset("assets/media/avatars/blank.png");

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Profile');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function getCoverAttribute($image)
    {
        if ($image) {
            return  asset('uploads/Profile').'/'  . $image ;
        }

        return $image;

    }

    public function setCoverAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Profile');
            $this->attributes['cover'] = $imageFields;
        }
    }


    public function getAboutAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_about;
        } else {
            return $this->en_about;
        }
    }
    public function getFirstNameAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_first_name;
        } else {
            return $this->en_first_name;
        }
    }
    public function getLastNameAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_last_name;
        } else {
            return $this->en_last_name;
        }
    }
    public function getTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_title;
        } else {
            return $this->en_title;
        }
    }
    public function getJobTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_job_title;
        } else {
            return $this->en_job_title;
        }
    }
    public function getCompanyAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_company;
        } else {
            return $this->en_company;
        }
    }

    public function getSubTitleAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_sub_title;
        } else {
            return $this->en_sub_title;
        }
    }

    public function getDesignationAttribute()
    {
        if ($locale = App::currentLocale() == "ar") {
            return $this->ar_designation;
        } else {
            return $this->en_designation;
        }
    }

}
