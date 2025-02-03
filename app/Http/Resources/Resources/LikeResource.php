<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'like_id' => $this->like_id,
            'user' => new UserResource($this->user),
            'video' => new VideoResource($this->video),
            'rating' => $this->like_rating,
            'timestamp' => $this->created_at
        ];
    }
}
