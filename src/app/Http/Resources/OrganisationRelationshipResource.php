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


      'members' => [
        'data' => MemberResource::collection($this->whenLoaded('members')),
      ],
      'dpos' => [
        'data' => MemberResource::collection($this->whenLoaded('dpos')),
      ],
      'processes' => [
        'data' => ProcessResource::collection($this->whenLoaded('processes')),
      ],
      'units'   => [
        'data' => UnitResource::collection($this->whenLoaded('units')),
      ],


    ];
    }
    public function with($request)
    {
        return [
      'links' => [
        'self' => route('organisation.show'),
      ],
    ];
    }
}
