<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\FavoriteMusicCollection;
use App\Http\Resources\Resources\FavoriteMusicResource;
use App\Models\FavoriteMusic;
use Illuminate\Http\Request;

class FavoriteMusicController extends Controller
{
    public function index()
    {
        return new FavoriteMusicCollection(FavoriteMusic::all());
    }

    public function show(FavoriteMusic $music)
    {
        return new FavoriteMusicResource($music);
    }
}
