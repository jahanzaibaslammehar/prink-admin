<?php

namespace App\Http\Controllers;

use App\Models\FavoriteVideos;
use App\Http\Resources\Resources\FavoriteVideoResource;
use App\Http\Resources\Collections\FavoriteVideosCollection;

class FavoriteVideosController extends Controller
{
    public function index()
    {
        return new FavoriteVideosCollection(FavoriteVideos::all());
    }

    public function show(FavoriteVideos $video)
    {
        return new FavoriteVideoResource($video);
    }
}
