<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoCategories;

class VideoCategoriesController extends Controller
{
    public function index()
    {
        $data = VideoCategories::all();
        return view('pages/video-category/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['video_category' => 'required|string', 'icon' => 'mimes:png|required']);

        $category = new VideoCategories();
        if ($request->has('icon')) {
            $icon = $request->icon;
            $ext = $icon->getClientOriginalExtension();
            $name = uniqid() . '.' . $ext;
            $icon->move(public_path('icons/category'), $name);
            $category->icon = url('icons/category/' . $name);
        }

        $category->video_category = $request->video_category;
        $category->save();

        //VideoCategories::create($request->all());
        return redirect(route('video-category.index'));
    }

    public function edit(VideoCategories $category)
    {
        $data = VideoCategories::all();
        return view('pages/video-category/edit', ['data' => $data, 'single' => $category]);
    }

    public function update(Request $request, VideoCategories $category)
    {
        $request->validate(['video_category' => 'required|string', 'is_active' => 'boolean', 'icon' => 'mimes:png']);

        if ($request->has('icon')) {
            $icon = $request->icon;
            $ext = $icon->getClientOriginalExtension();
            $name = uniqid() . '.' . $ext;
            $icon->move(public_path('icons/category'), $name);
            $category->icon = url('icons/category/' . $name);
        }

        $category->video_category = $request->video_category;
        $category->is_active = $request->is_active;
        $category->update();

        //category->update($request->all());
        return redirect(route('video-category.index'));
    }

    public function destory(VideoCategories $category)
    {
        $category->delete();
    }
}
