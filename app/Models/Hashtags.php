<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtags extends Model
{
    use HasFactory;

    protected $table = 'hashtags';
    protected $primaryKey = 'hashtag_id';
    protected $fillable = ['hashtag', 'is_active'];
}
