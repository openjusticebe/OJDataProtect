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
        return [
      'id' => (int)$this->id,
      'slug' => (string)$this->slug,
      'name' => $this->name,
      'short_name' => $this->short_name,
      'description' => (string)mb_strimwidth($this->description, 0, 144, "..."),
      'full_address' =>  (string)$this->address . ' ' . $this->city  . ' ' . $this->postal_code  . ' ' . $this->country,
      'address' => (string)$this->address,
      'city' => (string)$this->city,
      'postcode' => (string)$this->postcode,
      'country' => (string)$this->country,
      'logo_url' => (string)$this->logo_url,
      'vat_number' => (string)$this->vat_number,
      'relationships' => new OrganisationRelationshipResource($this),
      // 'tags_cloud' => TagCloudResource::collection($this->whenLoaded('tags')),
      'datetimes' => $this->datetimes,
      'links'         => [
        'self' => route('organisation.show', [$this]),
        'api_update' => route('api.organisation.update', [$this]),
      ],
    ];
    }
}
