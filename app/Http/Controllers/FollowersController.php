<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Http\Resources\Resources\FollowerResource;
use App\Http\Resources\Collections\FollowersCollection;

class FollowersController extends Controller
{
    public function index()
    {
        return new FollowersCollection(Followers::all());
    }

    public function show(Followers $follower)
    {
        return new FollowerResource($follower);
    }
}
