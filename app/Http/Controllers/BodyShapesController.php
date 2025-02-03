<?php

namespace App\Http\Controllers;

use App\Models\BodyShapes;
use App\Models\Genders;
use Illuminate\Http\Request;

class BodyShapesController extends Controller
{
    public function index()
    {
        $data = BodyShapes::with('gender')->get();
        $genders = Genders::where('is_active', 1)->get();
        return view('pages/body-shapes/create', ['data' => $data, 'genders' => $genders]);
    }

    public function create(Request $request)
    {
        $request->validate(['body_shape' => 'required|string', 'info' => 'max:512']);
        BodyShapes::create($request->all());
        return redirect(route('body-types.index'));
    }

    public function edit(BodyShapes $shape)
    {
        $data = BodyShapes::all();
        $genders = Genders::where('is_active', 1)->get();
        return view('pages/body-shapes/edit', ['data' => $data, 'single' => $shape, 'genders' => $genders]);
    }

    public function update(Request $request, BodyShapes $shape)
    {
        $request->validate(['body_shape' => 'required|string', 'is_active' => 'boolean', 'info' => 'max:512']);
        $shape->update($request->all());
        return redirect(route('body-types.index'));
    }

    public function destory(BodyShapes $shape)
    {
        $shape->delete();
    }
}
