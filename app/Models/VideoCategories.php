<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategories extends Model
{
    use HasFactory;

    protected $table = 'video_categories';
    protected $primaryKey = 'video_category_id';
    protected $fillable = ['video_category', 'is_active'];

    public function videos()
    {
        return $this->hasMany(Videos::class, 'video_category_id');
    }
}
