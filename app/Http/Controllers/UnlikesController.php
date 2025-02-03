<?php

namespace App\Http\Controllers;

use App\Models\Unlikes;
use App\Http\Resources\Resources\UnlikeResource;
use App\Http\Resources\Collections\UnlikesCollection;

class UnlikesController extends Controller
{
    public function index()
    {
        return new UnlikesCollection(Unlikes::all());
    }

    public function show(Unlikes $unlike)
    {
        return new UnlikeResource($unlike);
    }
}
