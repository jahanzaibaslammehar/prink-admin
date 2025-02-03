<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Resources\ProfileDetailResource;
use App\Http\Resources\Resources\ProfileSimpleResource;
use App\Http\Resources\Collections\ProfilesDetailCollection;
use App\Http\Resources\Collections\ProfilesSimpleCollection;

class ProfilesController extends Controller
{
    public function index(Request $request)
    {
        //$simple = $request->query('simple');
        //if ($simple == "false") {
        //    return new ProfilesDetailCollection(Profiles::all());
        //} else {
        //    return new ProfilesSimpleCollection(Profiles::all());
        //}
        return new ProfilesSimpleCollection(Profiles::all());
    }

    public function show(Request $request, Profiles $profile)
    {
        $simple = $request->query('simple');

        if ($simple == "false") {
            return new ProfileDetailResource($profile);
        } else {
            return new ProfileSimpleResource($profile);
        }
    }
}
