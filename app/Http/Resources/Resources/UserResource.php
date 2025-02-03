<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $action = '<a class="mr-3" href="' . route('app-users.view', $this->user_id) . '">🔍 View</a>';
        if ($this->is_active) {
            $action .= '<a class="mr-3" href="' . route('app-users.disable', $this->user_id) . '">🚫 Disable</a>';
        } else {
            $action .= '<a class="mr-3" href="' . route('app-users.disable', $this->user_id) . '">🔓 Enable</a>';
        }
        if ($this->is_verified) {
            $action .= '<a href="' . route('app-users.verify', $this->user_id) . '">❌ Unverify</a>';
        } else {
            $action .= '<a href="' . route('app-users.verify', $this->user_id) . '">✔️ Verify</a>';
        }

        return [
            'id' => $this->user_id,
            'username' => substr($this->username, 0, 16),
            'fullname' => substr($this->profile->first_name . ' ' . $this->profile->last_name, 0, 32),
            'email' => substr($this->email, 0, 32),
            'mobile' => $this->mobile,
            'gender' => $this->profile->gender ? new GenderResource($this->profile->gender) : ["gender" => null],
            'status' => $this->is_active ? '<div class="text-success">Active</div>' : '<div class="text-danger">Inactive</div>',
            'verified' => $this->is_verified ? '<div class="text-success">Verified</div>' : '<div class="text-danger">Unverified</div>',
            'action' => $action,
        ];
    }
}
