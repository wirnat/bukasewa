<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Properti extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'properti'=>$this->properti,
            'status'=>$this->status,
            'id_properti'=>$this->id_properti
        ];
    }
}
