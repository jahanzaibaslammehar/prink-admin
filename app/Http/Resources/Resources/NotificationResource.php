<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'notification_id' => $this->notification_id,
            'user' => new UserResource($this->user),
            'type' => $this->notification_type,
            'notification' => $this->notification,
            'is_readed' => $this->is_read,
            'timestamp' => $this->created_at
        ];
    }
}
