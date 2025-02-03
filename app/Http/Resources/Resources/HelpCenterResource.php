<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HelpCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $action = '<a class="mr-3" href="' . route('help-center.show', $this->id) . '">🔍 View</a>';

        return [
            'username' => "<a href='" . route('app-users.view', $this->user_id) . "'>$this->username</a>",
            'subject' => $this->subject,
            'message' => substr($this->message, 0, 42),
            'created_at' => date('d-m-Y h:iA', strtotime($this->created_at)),
            'action' => $action
        ];
    }
}
