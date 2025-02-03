<?php

namespace App\Models;

use App\Models\Genders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BodyShapes extends Model
{
    use HasFactory;

    protected $table = 'body_shapes';
    protected $primaryKey = 'body_shape_id';

    protected $fillable = ['body_shape', 'is_active', 'info', 'gender_id'];

    public function videos()
    {
        return $this->hasMany(Videos::class, 'video_id');
    }

    public function profiles()
    {
        return $this->hasMany(Profiles::class, 'profile_id');
    }

    public function gender()
    {
        return $this->hasOne(Genders::class, 'gender_id', 'gender_id');
    }
}
