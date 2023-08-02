<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->lang == 'ar'){
            return [
                'id'=>$this->id,
                'type'=>$this->User->type,
                'first_name'=>$this->ar_first_name,
                'last_name'=>$this->ar_last_name,
//                'job_title'=>$this->ar_job_title,
                'company'=>$this->ar_company,
                'title'=>$this->ar_title,
                'sub_title'=>$this->ar_sub_title,
                'socail'=>$this->ElementsSocial,
                'image'=>$this->image,
                'cover'=>$this->cover,
                'lang'=>$this->lang,
                'active_save_contact'=>$this->active_save_contact,
                'active_exchange_contact'=>$this->active_exchange_contact,
                'about'=>$this->ar_about,
                'business_hours'=>$this->business_hours,

            ];
        }else{
            return [
                'id'=>$this->id,
                'type'=>$this->User->type,
                'first_name'=>$this->en_first_name,
                'last_name'=>$this->en_last_name,
//                'job_title'=>$this->en_job_title,
                'company'=>$this->en_company,
                'title'=>$this->en_title,
                'sub_title'=>$this->en_sub_title,
                'socail'=>$this->ElementsSocial,
                'image'=>$this->image,
                'cover'=>$this->cover,
                'lang'=>$this->lang,
                'active_save_contact'=>$this->active_save_contact,
                'active_exchange_contact'=>$this->active_exchange_contact,
                'about'=>$this->en_about,
                'business_hours'=>$this->business_hours,

            ];
        }

    }
}
