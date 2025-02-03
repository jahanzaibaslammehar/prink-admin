<?php

namespace App\Http\Resources\Resources;

use App\Http\Resources\Collections\AbuseReportsCollection;
use App\Http\Resources\Collections\CommentsCollection;
use App\Http\Resources\Collections\FavoriteMusicCollection;
use App\Http\Resources\Collections\FavoriteVideosCollection;
use App\Http\Resources\Collections\FollowersCollection;
use App\Http\Resources\Collections\FollowingsCollection;
use App\Http\Resources\Collections\LikesCollection;
use App\Http\Resources\Collections\MusicCollection;
use App\Http\Resources\Collections\NotificationsCollection;
use App\Http\Resources\Collections\UnlikesCollection;
use App\Http\Resources\Collections\VideosCollection;
use App\Http\Resources\Collections\ViewsCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileSimpleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *$user->
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->user;
        return [
            'profile_id' => $this->profile_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->user->email,
            'mobile' => $this->user->mobile,
            'dob' => $this->dob,
            'location' => $this->location->location,
            'gender' => $this->gender->gender,
            'body_shape' => $this->body_shape->body_shape,
            'photo' => $this->photo,
            'abuse_reports' => $user->abuse_reported->count(),
            'comments' => $user->comments->count(),
            'favorite_videos' => $user->favorite_videos->count(),
            'favorite_music' => $user->favorite_musics->count(),
            'followers' => $user->followers->count(),
            'followings' => $user->followings->count(),
            'likes' => $user->likes->count(),
            'unlikes' => $user->unlikes->count(),
            'musics' => $user->musics->count(),
            'notifications' => $user->notifications->count(),
            'videos' => $user->videos->count(),
            'views' => $user->views->count(),
        ];
    }
}
