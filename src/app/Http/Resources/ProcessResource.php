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
      'short_name' => (string)mb_strimwidth($this->name, 0, 45, "..."),
      'description' => $this->description,
      'organisation_id' => $this->organisation_id,
      'tags' => TagResource::collection($this->whenLoaded('tags')),
      'tagsGrouped' => $this->whenLoaded('tags') ? $this->tagsGrouped : null,
      'updated_by' => $this->editor ? $this->editor->name : null,
      'created_by' => $this->creator ? $this->creator->name : null,
      'notified_at' => $this->notified_at,
      'datetimes' => $this->datetimes,
      'links'         => [
        'self' => route('organisation.process.show', [$this->organisation, $this->id]),
        'api_update' => route('api.organisation.process.update', [$this->organisation, $this->id]),
        'api_graph' => route('api.organisation.process.graph', [$this->organisation, $this->id]),
        'api_resources_tags' => route('api.organisation.api_resources_tags', [$this->organisation]),
        'download_dpa' => route('organisation.process.downloadDPA', [$this->organisation, $this->id]),
      ],
    ];
    }
}
