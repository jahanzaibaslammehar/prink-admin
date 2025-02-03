<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\LocationsCollection;
use App\Http\Resources\Resources\LocationResource;
use App\Models\Locations;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $data = Locations::all();
        return view('pages/locations/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['location' => 'required|string']);
        Locations::create($request->all());
        return redirect(route('locations.index'));
    }

    public function edit(Locations $location)
    {
        $data = Locations::all();
        return view('pages/locations/edit', ['data' => $data, 'single' => $location]);
    }

    public function update(Request $request, Locations $location)
    {
        $request->validate(['location' => 'required|string', 'is_active' => 'boolean']);
        $location->update($request->all());
        return redirect(route('locations.index'));
    }

    public function destory(Locations $location)
    {
        $location->delete();
    }
}
