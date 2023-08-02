<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['id','serial',',secret','type','parent_id','user_id','company_id','profile_id','is_active','qrcode','is_lock'];
    public function User(){
        return $this->belongsTo(User::class,'user_id')->withDefault([
            'id'=>0,
            'name'=>''
        ]);
    }
    public function company(){
        return $this->belongsTo(User::class,'company_id')->withDefault([
            'id'=>0,
            'name'=>''
        ]);
    }
    public function Profile(){
        return $this->belongsTo(Profile::class,'profile_id')->withDefault([
            'name'=>'',
            'profile_url'=>'',
            'id'=>0

        ]);
    }

    public function TappingLog(){
        return $this->hasMany(TappingLog::class,'card_id');
    }

    public function AppointmentsRelation(){

        return $this->hasMany(AppointmentsRelation::class,'card_id');

    }
    public function ExchangeContact(){

        return $this->hasMany(ExchangeContact::class,'card_id');

    }

    public function getQrcodeAttribute($image){

        return  asset('qrcode/'.$image);
    }


}
