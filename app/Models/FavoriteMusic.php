<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteMusic extends Model
{
    use HasFactory;

    protected $table = 'favorite_music';
    protected $primaryKey = 'favorite_music_id';

    public function music()
    {
        return $this->belongsTo(Music::class, 'music_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
