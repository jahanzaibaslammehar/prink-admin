<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\CommentResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentsCollection extends ResourceCollection
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
            'data' => CommentResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()]
        ];
    }
}
