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
      'datetimes' => $this->datetimes,
      'tags' => TagResource::collection($this->whenLoaded('tags')),
      'links'         => [
        'self' => route('organisation.process.show', [$this->organisation->slug, $this->id]),
        'api_update' => route('api.organisation.process.update', [$this->organisation, $this]),
      ],
    ];
    }
}
