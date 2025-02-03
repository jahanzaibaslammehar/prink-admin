<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
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
            'music_id' => $this->music_id,
            'category' => $this->category->music_category,
            'url' => $this->music_url,
            'hashtags' => $this->hashtags,
            'upload_by' => new UserResource($this->user),
            'uploaded_at' => $this->created_at
        ];
    }
}
