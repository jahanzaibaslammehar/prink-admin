<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\HelpCenterResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HelpCenterCollection extends ResourceCollection
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
            'data' => HelpCenterResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()]
        ];
    }
}
