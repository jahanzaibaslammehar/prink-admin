<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $music = null;
        // if ($this->music_type == 'custom'){
        //     $music = new MusicResource($this->music);
        // }
        $action = '<a class="mr-3" target="_blank" href="' . $this->video_url . '">🔍 View</a>';
        $action .= '<a class="mr-3" href="' . route('app-users.view', [$this->upload_by]) . '">👤 User</a>';

        if ($this->is_disabled) {
            $action .= '<a class="mr-3" href="' . route('app-users.video.toggle', [$this->upload_by, $this->video_id]) . '">❌ Disabled</a>';
        } else {
            $action .= '<a class="mr-3" href="' . route('app-users.video.toggle', [$this->upload_by, $this->video_id]) . '">✔️ Enabled</a>';
        }

        return [
            'gender' => $this->gender->gender,
            'body_shape' => $this->body_shape->body_shape,
            'color' => $this->color->color_name,
            'outfit_type' => $this->outfit_type->outfit_type,
            'category' => $this->category->video_category,
            'is_private' => $this->is_private ? 'Private Video' : 'Public Video',
            'upload_by' => $this->user->username,
            'uploaded_at' =>  date('d-m-Y h:iA', strtotime($this->created_at)),
            'action' => $action

            //'url' => $this->video_url,
            //'video_id' => $this->video_id,
            //'hashtags' => $this->hashtags,
            //'music_type' => $this->music_type,
            //'music' => $music,
            //'upload_by' => new UserResource($this->user),
        ];
    }
}
