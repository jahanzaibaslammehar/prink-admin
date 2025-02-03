<?php

namespace App\Http\Controllers;

use App\Models\Views;
use App\Http\Resources\Resources\ViewResource;
use App\Http\Resources\Collections\ViewsCollection;

class ViewsController extends Controller
{
    public function index()
    {
        return new ViewsCollection(Views::all());
    }

    public function show(Views $view)
    {
        return new ViewResource($view);
    }
}
