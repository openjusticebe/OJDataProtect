<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationResource extends JsonResource
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
      'created_at' => $this->created_at->diffForHumans(),
      'updated_at' => $this->updated_at->diffForHumans(),
      'processes' => $this->processes()->get()

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
