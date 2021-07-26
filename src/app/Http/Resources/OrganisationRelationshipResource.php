<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationRelationshipResource extends JsonResource
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

      'members' => MemberResource::collection($this->whenLoaded('members')),
      'dpos' => MemberResource::collection($this->whenLoaded('dpos')),
      'processes' => ProcessResource::collection($this->whenLoaded('processes')),
      'tags' => TagResource::collection($this->whenLoaded('tags')),
      'units'   => UnitResource::collection($this->whenLoaded('units')),
    ];
    }
}
