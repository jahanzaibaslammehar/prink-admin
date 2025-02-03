<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followings extends Model
{
    use HasFactory;

    protected $table = 'followings';
    protected $primaryKey = 'following_id';

    public function following()
    {
        return $this->belongsTo(User::class, 'following_user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
