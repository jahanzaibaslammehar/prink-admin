<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $primaryKey = 'video_id';
    protected $fillable = ['is_disabled'];

    public function gender()
    {
        return $this->belongsTo(Genders::class, 'gender_id');
    }

    public function body_shape()
    {
        return $this->belongsTo(BodyShapes::class, 'body_shape_id');
    }

    public function color()
    {
        return $this->belongsTo(Colors::class, 'color_id');
    }

    public function outfit_type()
    {
        return $this->belongsTo(OutfitTypes::class, 'outfit_type_id');
    }

    public function category()
    {
        return $this->belongsTo(VideoCategories::class, 'video_category_id');
    }

    public function music()
    {
        return $this->hasOne(Music::class, 'music_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'upload_by', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'video_id');
    }

    public function likes()
    {
        return $this->hasMany(Likes::class, 'video_id');
    }

    public function views()
    {
        return $this->hasMany(Views::class, 'video_id');
    }

    public function unlikes()
    {
        return $this->hasMany(Unlikes::class, 'video_id');
    }

    public function abuse_reports()
    {
        return $this->hasMany(AbuseReports::class, 'report_for')->where('report_type', 'video');
    }

    public function whos_favorite()
    {
        return $this->hasMany(FavoriteVideos::class, 'video_id');
    }
}
