<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Resources\Collections\HelpCenterCollection;
use App\Http\Resources\Collections\SubscriptionCollection;

class SubscriptionController extends Controller
{
    public function index($type = null)
    {
        return view('pages/subscriptions/list');
    }

    public function list()
    {
        $list = DB::table('emails')->get();
        return new SubscriptionCollection($list);
    }
}
