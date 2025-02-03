<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        $data = Colors::all();
        return view('pages/colors/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['color_name' => 'required|string', 'color_code' => 'required|string']);
        Colors::create($request->all());
        return redirect(route('colors.index'));
    }

    public function edit(Colors $color)
    {
        $data = Colors::all();
        return view('pages/colors/edit', ['data' => $data, 'single' => $color]);
    }

    public function update(Request $request, Colors $color)
    {
        $request->validate(['color_name' => 'required|string', 'color_code' => 'required|string', 'is_active' => 'boolean']);
        $color->update($request->all());
        return redirect(route('colors.index'));
    }

    public function destory(Colors $color)
    {
        $color->delete();
    }
}
