<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnlikeResource extends JsonResource
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
            'unlike_id' => $this->unlike_id,
            'user' => new UserResource($this->user),
            'video' => new VideoResource($this->video),
            'timestamp' => $this->created_at
        ];
    }
}
