<?php

namespace App\Models;

use App\Models\BodyShapes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genders extends Model
{
    use HasFactory;

    protected $table = 'genders';
    protected $primaryKey = 'gender_id';
    protected $fillable = ['gender', 'is_active'];

    public function videos()
    {
        return $this->hasMany(Videos::class, 'video_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function body_shapes()
    {
        return $this->hasMany(BodyShapes::class, 'gender_id');
    }
}
