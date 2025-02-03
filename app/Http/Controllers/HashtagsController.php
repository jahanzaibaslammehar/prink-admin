<?php

namespace App\Http\Controllers;

use App\Models\Hashtags;
use Illuminate\Http\Request;

class HashtagsController extends Controller
{
    public function index()
    {
        $data = Hashtags::all();
        return view('pages/hashtags/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['hashtag' => 'required|string']);
        Hashtags::create($request->all());
        return redirect(route('hashtags.index'));
    }

    public function edit(Hashtags $hashtag)
    {
        $data = Hashtags::all();
        return view('pages/hashtags/edit', ['data' => $data, 'single' => $hashtag]);
    }

    public function update(Request $request, Hashtags $hashtag)
    {
        $request->validate(['hashtag' => 'required|string', 'is_active' => 'boolean']);
        $hashtag->update($request->all());
        return redirect(route('hashtags.index'));
    }

    public function destory(Hashtags $hashtag)
    {
        $hashtag->delete();
    }
}
