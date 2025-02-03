<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\MusicCategoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MusicCategoriesCollection extends ResourceCollection
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
            'data' => MusicCategoryResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()]
        ];
    }
}
