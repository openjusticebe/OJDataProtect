<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagSelectResource extends JsonResource
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
      'name'   => (string)$this['name'],
      'format' => (string)$this['format'],
      'default_description' => (string)$this['default_description'],
    ];
    }
}
