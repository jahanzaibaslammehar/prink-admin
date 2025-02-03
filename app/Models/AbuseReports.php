<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbuseReports extends Model
{
    use HasFactory;

    protected $table = 'abuse_reports';
    protected $primaryKey = 'abuse_report_id';
    protected $fillable = ['action', 'status'];

    public function video()
    {
        return $this->hasOne(Videos::class, 'video_id', 'report_for');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'report_for');
    }

    public function action_by()
    {
        return $this->hasOne(User::class, 'user_id', 'taken_by');
    }

    public function reported_by()
    {
        return $this->hasOne(User::class, 'user_id', 'report_by');
    }
}
