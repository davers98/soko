<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'type'=>$this->businesstype,
            'location'=>$this->location,
            'user'=>$this->user,
            'overview'=>$this->overview,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
