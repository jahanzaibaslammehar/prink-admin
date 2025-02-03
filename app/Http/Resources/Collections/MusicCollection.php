<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\MusicResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MusicCollection extends ResourceCollection
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
            'data' => MusicResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()]
        ];
    }
}
