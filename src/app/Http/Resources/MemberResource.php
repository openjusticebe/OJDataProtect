<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Organisation;

class MemberResource extends JsonResource
{
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function toArray($request)
    {
        $organisation = Organisation::findOrFail($this->pivot->organisation_id);

        return [
      'type'          => 'users',
      'id'            => (int)$this->id,
      'name'          => (string)$this->name,
      'email'         => (string)$this->email,
      'email_hash'    => (string)md5($this->email),
      'datetimes'     => $this->datetimes,
      'member_type'   => (string)$this->pivot->member_type,
      'member_since'  => (string)$this->pivot->created_at->diffForHumans(['parts' => 2]),
      'organisation_id' => (int)$this->pivot->organisation_id,
      'is_auth'       => (boolean)$this->is_auth,
      'links'         => [
        'self' => '',
        'api_update' => route('api.organisation.users.update', [$organisation, $this]),
        'api_detach' => route('api.organisation.users.detach', [$organisation, $this]),
        'api_store' => route('api.organisation.users.store', [$organisation]),
      ],
      'datetimes' => $this->datetimes,
    ];
    }
}
