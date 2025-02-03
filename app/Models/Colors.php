<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;

    protected $table = 'colors';
    protected $primaryKey = 'color_id';
    protected $fillable = ['color_name', 'color_code', 'is_active'];

    public function videos()
    {
        return $this->hasMany(Videos::class, 'video_id');
    }
}
