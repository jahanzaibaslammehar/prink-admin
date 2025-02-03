<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Collections\UsersCollection;
use App\Http\Resources\Resources\UserResource;
use App\Models\Music;
use App\Models\Videos;

class AppUsersController extends Controller
{
    public function list()
    {
        return  new UsersCollection(User::where('is_admin', '!=', 1)->get());
    }

    public function index()
    {
        return view('pages/app-users/list');
    }

    public function show(Request $request, User $user)
    {
        $view = $request->query('view');
        if ($view == "music") {
            $uploads =  Music::where('upload_by', $user->user_id)->with('category')->get();
        } else {
            $uploads = Videos::where('upload_by', $user->user_id)->with('category', 'likes', 'comments')->get();
        }
        return view('pages/app-users/view', ['single' => $user, 'uploads' => $uploads, 'type' => $view]);
    }

    public function update(Request $request, User $user)
    {
        return redirect(route('app-users.index'));
    }

    public function disable(User $user)
    {
        $user->update(["is_active" => $user->is_active ? 0 : 1]);
        return redirect(route('app-users.index'));
    }

    public function verify(User $user)
    {
        $user->update(["is_verified" => $user->is_verified ? 0 : 1]);
        return redirect(route('app-users.index'));
    }

    public function toggleVideo(User $user, Videos $video)
    {
        $disabled = $video->is_disabled ? 0 : 1;
        $user->videos()->where('video_id', $video->video_id)->update(["is_disabled" => $disabled, "is_published" => $disabled]);
        return redirect()->to(url()->previous());
    }
}
