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
      'tag_type' => $this->tag_type,
      'category' => $this->category,
      'description' => $this->description,
      'pivot' => $this->pivot,
      'specific_organisation' => (string)$this->pivot ? $this->pivot->specific_organisation : false
    ];
    }
}
