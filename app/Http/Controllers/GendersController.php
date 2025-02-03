<?php

namespace App\Http\Controllers;

use App\Models\Genders;
use Illuminate\Http\Request;

class GendersController extends Controller
{
    public function index()
    {
        $data = Genders::all();
        return view('pages/genders/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['gender' => 'required|string']);
        Genders::create($request->all());
        return redirect(route('genders.index'));
    }

    public function edit(Genders $gender)
    {
        $data = Genders::all();
        return view('pages/genders/edit', ['data' => $data, 'single' => $gender]);
    }

    public function update(Request $request, Genders $gender)
    {
        $request->validate(['gender' => 'required|string', 'is_active' => 'boolean']);
        $gender->update($request->all());
        return redirect(route('genders.index'));
    }

    public function destory(Genders $gender)
    {
        $gender->delete();
    }
}
