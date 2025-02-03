<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 'email', 'password', 'is_admin', 'is_active', 'is_verified',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //protected $appends = ['photo'];

    /*
    public function getPhotoUrlAttribute()
    {
        if ($this->foto !== null) {
            return url('media/user/' . $this->id . '/' . $this->foto);
        } else {
            return url('media-example/no-image.png');
        }
    }
    */

    //Abuse Reports
    public function abuse_reported()
    {
        return $this->hasMany(AbuseReports::class, 'report_by', 'user_id');
    }

    public function abuse_reports_received()
    {
        return $this->hasMany(AbuseReports::class, 'report_for', 'user_id');
    }

    public function abuse_reports_actions()
    {
        return $this->hasMany(AbuseReports::class, 'taken_by', 'user_id');
    }

    //Vidoes
    public function videos()
    {
        return $this->hasMany(Videos::class, 'upload_by', 'user_id');
    }

    public function favorite_videos()
    {
        return $this->hasMany(FavoriteVideos::class, 'user_id');
    }

    //Music
    public function musics()
    {
        return $this->hasMany(Music::class, 'upload_by', 'user_id');
    }

    public function favorite_musics()
    {
        return $this->hasMany(FavoriteMusic::class, 'user_id');
    }

    //Followers
    public function followers()
    {
        return $this->hasMany(Followers::class, 'user_id');
    }

    //Followings
    public function followings()
    {
        return $this->hasMany(Followings::class, 'user_id');
    }

    //Comments
    public function comments()
    {
        return $this->hasMany(Comments::class, 'user_id');
    }

    //Likes/Unlikes
    public function likes()
    {
        return $this->hasMany(Likes::class, 'user_id');
    }

    public function unlikes()
    {
        return $this->hasMany(Unlikes::class, 'user_id');
    }

    //Views
    public function views()
    {
        return $this->hasMany(Views::class, 'user_id');
    }

    //Notifications
    public function notifications()
    {
        return $this->hasMany(Notifications::class, 'user_id');
    }

    //Profile
    public function profile()
    {
        return $this->hasOne(Profiles::class, 'user_id');
    }
}
