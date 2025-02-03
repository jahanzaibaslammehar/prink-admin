<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'music';
    protected $primaryKey = 'music_id';

    public function category()
    {
        return $this->belongsTo(MusicCategories::class, 'music_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'upload_by', 'user_id');
    }

    public function favorite_musics()
    {
        return $this->hasMany(FavoriteMusic::class, 'music_id');
    }
}
