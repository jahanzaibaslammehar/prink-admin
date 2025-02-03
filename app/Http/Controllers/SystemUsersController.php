<?php

namespace App\Http\Controllers;

use App\Models\BodyShapes;
use App\Models\Genders;
use App\Models\Locations;
use App\Models\Profiles;
use App\Models\User;
use Illuminate\Http\Request;

class SystemUsersController extends Controller
{
    public function index()
    {
        $data = User::where('is_admin', 1)->get();
        $locations = Locations::where('is_active', 1)->get();
        $genders = Genders::where('is_active', 1)->get();
        $body_shapes = BodyShapes::where('is_active', 1)->get();

        return view('pages/system-users/create', ['data' => $data, 'locations' => $locations, 'genders' => $genders, 'body_shapes' => $body_shapes]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string'
        ]);

        $parts = explode('@', $request->email);
        $username = $parts[0] . rand(11, 99);

        $user = User::create([
            'username' => $username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 1
        ]);

        Profiles::create([
            'user_id' => $user->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => date('Y-m-d', time()),
            'location_id' => 1,
            'gender_id' => 1,
            'body_shape_id' => 1
        ]);

        return redirect(route('system-users.index'));
    }

    public function edit(User $user)
    {
        $data = User::where('is_admin', 1)->get();
        $locations = Locations::where('is_active', 1)->get();
        $genders = Genders::where('is_active', 1)->get();
        $body_shapes = BodyShapes::where('is_active', 1)->get();

        return view('pages/system-users/edit', ['data' => $data, 'single' => $user, 'locations' => $locations, 'genders' => $genders, 'body_shapes' => $body_shapes]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'string|nullable',
            'dob' => 'required|date',
        ]);

        if (!empty($request->password)) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        if ($request->has('is_active')) {
            $user->update([
                'is_active' => $request->is_active
            ]);
        }

        $user->profile->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'location_id' => $request->location_id,
            'gender_id' => $request->gender_id,
            'body_shape_id' => $request->body_shape_id,
        ]);
        return redirect(route('system-users.index'));
    }

    public function destory(User $user)
    {
        if (auth()->user()->user_id != $user->user_id) {
            $user->delete();
        }
    }
}
