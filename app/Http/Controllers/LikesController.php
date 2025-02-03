<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Http\Resources\Resources\LikeResource;
use App\Http\Resources\Collections\LikesCollection;

class LikesController extends Controller
{
    public function index()
    {
        return new LikesCollection(Likes::all());
    }

    public function show(Likes $like)
    {
        return new LikeResource($like);
    }
}
