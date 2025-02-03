<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\LocationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationsCollection extends ResourceCollection
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
            'data' => LocationResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()]
        ];
    }
}
