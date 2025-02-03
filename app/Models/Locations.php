<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Profiler\Profile;

class Locations extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $primaryKey = 'location_id';
    protected $fillable = ['location', 'is_active'];

    public function profiles()
    {
        return $this->hasMany(Profiles::class, 'location_id');
    }
}
