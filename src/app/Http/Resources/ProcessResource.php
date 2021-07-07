<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessResource extends JsonResource
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
      'description' => $this->description,
      'organisation_id' => $this->organisation_id,
      'created_at' => $this->created_at->diffForHumans(),
      'updated_at' => $this->updated_at->diffForHumans(),
      'tags' => $this->tags()->get()

    ];
  }
  public function with($request) {
    return [
      'api_version' => config('mesylab.api_version'),
      'author_url' => config('mesylab.url')
    ];
  }
}
