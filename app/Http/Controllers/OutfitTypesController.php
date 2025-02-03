<?php

namespace App\Http\Controllers;

use App\Models\OutfitTypes;
use Illuminate\Http\Request;

class OutfitTypesController extends Controller
{
    public function index()
    {
        $data = OutfitTypes::all();
        return view('pages/outfit-types/create', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate(['outfit_type' => 'required|string', 'icon' => 'mimes:png|required']);

        $outfit = new OutfitTypes();
        if ($request->has('icon')) {
            $icon = $request->icon;
            $ext = $icon->getClientOriginalExtension();
            $name = uniqid() . '.' . $ext;
            $icon->move(storage_path('app/public/icons/outfits'), $name);
            $outfit->icon = url('storage/icons/outfits/' . $name);
        }

        $outfit->outfit_type = $request->outfit_type;
        $outfit->save();

        //OutfitTypes::create($request->all());
        return redirect(route('outfit-types.index'));
    }

    public function edit(OutfitTypes $type)
    {
        $data = OutfitTypes::all();
        return view('pages/outfit-types/edit', ['data' => $data, 'single' => $type]);
    }

    public function update(Request $request, OutfitTypes $type)
    {
        $request->validate(['outfit_type' => 'required|string', 'is_active' => 'boolean', 'icon' => 'mimes:png']);

        if ($request->has('icon')) {
            $icon = $request->icon;
            $ext = $icon->getClientOriginalExtension();
            $name = uniqid() . '.' . $ext;
            $icon->move(storage_path('app/public/icons/outfits'), $name);
            $outfit->icon = url('storage/icons/outfits/' . $name);
        }

        $type->outfit_type = $request->outfit_type;
        $type->is_active = $request->is_active;
        $type->update();

        //$type->update($request->all());
        return redirect(route('outfit-types.index'));
    }

    public function destory(OutfitTypes $type)
    {
        $type->delete();
    }
}
