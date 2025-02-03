<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteVideos extends Model
{
    use HasFactory;

    protected $table = 'favorite_videos';
    protected $primaryKey = 'favorite_video_id';

    public function video()
    {
        return $this->belongsTo(Videos::class, 'video_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
