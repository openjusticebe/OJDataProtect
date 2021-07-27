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
      'name' => (string)mb_strimwidth($this->name, 0, 45, "..."),
      'description' => (string)mb_strimwidth($this->description, 0, 144, "..."),
      'full_address' =>  $this->address . ' ' . $this->city  . ' ' . $this->postal_code  . ' ' . $this->country,
      'address' => $this->address,
      'city' => $this->city,
      'postcode' => $this->postcode,
      'country' => $this->country,
      'logo_url' => $this->logo_url,
      'vat_number' => $this->vat_number,
      'relationships' => new OrganisationRelationshipResource($this),
      'datetimes' => $this->datetimes,
      'links'         => [
        'self' => route('organisation.show', [$this]),
        'api_update' => route('api.organisation.update', [$this]),
      ],
    ];
    }
}
