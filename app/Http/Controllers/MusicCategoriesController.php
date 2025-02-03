<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicCategories;

class MusicCategoriesController extends Controller
{
    public function index()
    {
        $data = MusicCategories::all();
        return view('pages/music-category/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['music_category' => 'required|string']);
        MusicCategories::create($request->all());
        return redirect(route('music-category.index'));
    }

    public function edit(MusicCategories $category)
    {
        $data = MusicCategories::all();
        return view('pages/music-category/edit', ['data' => $data, 'single' => $category]);
    }

    public function update(Request $request, MusicCategories $category)
    {
        $request->validate(['music_category' => 'required|string', 'is_active' => 'boolean']);
        $category->update($request->all());
        return redirect(route('music-category.index'));
    }

    public function destory(MusicCategories $category)
    {
        $category->delete();
    }
}
