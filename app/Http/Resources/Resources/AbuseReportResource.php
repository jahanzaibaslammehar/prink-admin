<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbuseReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $action = '<a class="mr-3" href="' . route('abuse-reports.edit', $this->abuse_report_id) . '">✏️ Take Action</a>';
        $detail = "";
        if ($this->report_type == "video") {
            $detail = $this->video->video_id;
        } else {
            $detail = $this->user ? $this->user->username : '-';
        }

        return [
            'abuse_id' => $this->abuse_report_id,
            'report_type' => ucfirst($this->report_type) . " (" . $detail . ")",
            'report_by' => $this->reported_by->username,
            'reason' => $this->reason,
            'timestamp' => date('d-m-Y h:iA', strtotime($this->created_at)),
            'status' => $this->status,
            'action' => $action
        ];
    }
}
