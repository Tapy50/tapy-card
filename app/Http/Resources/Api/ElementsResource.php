<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ElementsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'title'=>(string)$this->title,
            'type'=>(string)$this->type,
            'sub_type'=>(string)$this->sub_type,
            'value'=>(string)$this->value,
        ];
    }
}
