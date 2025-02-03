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

class ProfileDetailResource extends JsonResource
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
            'abuse_reports' => new AbuseReportsCollection($user->abuse_reported),
            'comments' => new CommentsCollection($user->comments),
            'favorite_videos' => new FavoriteVideosCollection($user->favorite_videos),
            'favorite_music' => new FavoriteMusicCollection($user->favorite_musics),
            'followers' => new FollowersCollection($user->followers),
            'followings' => new FollowingsCollection($user->followings),
            'likes' => new LikesCollection($user->likes),
            'unlikes' => new UnlikesCollection($user->unlikes),
            'musics' => new MusicCollection($user->musics),
            'notifications' => new NotificationsCollection($user->notifications),
            'videos' => new VideosCollection($user->videos),
            'views' => new ViewsCollection($user->views),
        ];
    }
}
