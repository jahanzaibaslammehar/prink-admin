<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $primaryKey = 'profile_id';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'location_id',
        'gender_id',
        'body_shape_id'
    ];

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id');
    }

    public function gender()
    {
        return $this->belongsTo(Genders::class, 'gender_id');
    }

    public function body_shape()
    {
        return $this->belongsTo(BodyShapes::class, 'body_shape_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
