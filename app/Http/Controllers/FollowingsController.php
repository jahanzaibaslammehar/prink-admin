<?php

namespace App\Http\Controllers;

use App\Models\Followings;
use App\Http\Resources\Resources\FollowingResource;
use App\Http\Resources\Collections\FollowingsCollection;

class FollowingsController extends Controller
{
    public function index()
    {
        return new FollowingsCollection(Followings::all());
    }

    public function show(Followings $following)
    {
        return new FollowingResource($following);
    }
}
