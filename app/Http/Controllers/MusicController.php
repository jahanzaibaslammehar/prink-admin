<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\MusicCollection;
use App\Http\Resources\Resources\MusicResource;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        return new MusicCollection(Music::all());
    }

    public function show(Music $music)
    {
        return new MusicResource($music);
    }
}
