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
      'id' => (int)$this->id,
      'slug' => (string)$this->slug,
      'name' => (string)mb_strimwidth($this->name, 0, 45, "..."),
      'description' => (string)mb_strimwidth($this->description, 0, 144, "..."),
      'processes' => $this->processes()->get(),
      'datetimes' => $this->datetimes,
      // 'relationships' => new CollectionRelationshipResource($this),
      'links'         => [
        'self' => route('organisation.show', [$this->slug]),
        'api_update' => '',
      ],
    ];
    }
}
