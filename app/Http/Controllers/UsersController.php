<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\Collections\UsersCollection;
use App\Http\Resources\Collections\VideosCollection;
use App\Http\Resources\Resources\UserResource;

class UsersController extends Controller
{
    public function index()
    {
        return new UsersCollection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function videos(User $user)
    {
        return new VideosCollection($user->videos);
    }
}
