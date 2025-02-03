<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Resources\Collections\HelpCenterCollection;

class HelpCenterController extends Controller
{
    public function index($type = null)
    {
        return view('pages/help-center/list');
    }

    public function list()
    {
        $list = DB::table('help_centers')->join('users', 'help_centers.user_id', '=', 'users.user_id')->select('help_centers.*', 'users.username')->get();
        return new HelpCenterCollection($list);
    }

    public function show($id)
    {
        $help = DB::table('help_centers')
            ->join('users', 'help_centers.user_id', '=', 'users.user_id')
            ->select(
                'help_centers.*',
                'users.username',
                'users.email',
                'users.mobile',
                'users.is_active',
                'users.is_private',
                'users.is_verified',
                'users.created_at as user_created'
            )
            ->where('id', $id)
            ->first();

        if (!$help) {
            return abort(404);
        }
        return view('pages/help-center/show', ['help' => $help]);
    }
}
