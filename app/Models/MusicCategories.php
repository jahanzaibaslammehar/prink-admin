<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicCategories extends Model
{
    use HasFactory;

    protected $table = 'music_categories';
    protected $primaryKey = 'music_category_id';
    protected $fillable = ['music_category', 'is_active'];

    public function musics()
    {
        return $this->hasMany(Music::class, 'music_category_id');
    }
}
