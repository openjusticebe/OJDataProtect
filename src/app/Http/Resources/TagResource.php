<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
      'id' => $this->id,
      'name' => $this->name,
      'description' => $this->description
    ];
    }
    public function with($request)
    {
        return [
      'api_version' => null,
      'author_url' => null
    ];
    }
}
