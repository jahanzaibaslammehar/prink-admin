<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutfitTypes extends Model
{
    use HasFactory;

    protected $table = 'outfit_types';
    protected $primaryKey = 'outfit_type_id';
    protected $fillable = ['outfit_type', 'is_active'];

    public function videos()
    {
        return $this->hasMany(Videos::class, 'outfit_type_id');
    }
}
