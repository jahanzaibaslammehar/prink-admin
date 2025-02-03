<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Resources\ProfileSimpleResource;

class ProfilesSimpleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => ProfileSimpleResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()]
        ];
    }
}
