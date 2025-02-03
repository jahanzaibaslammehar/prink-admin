<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\NotificationsCollection;
use App\Http\Resources\Resources\NotificationResource;
use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        return new NotificationsCollection(Notifications::all());
    }

    public function show(Notifications $notification)
    {
        return new NotificationResource($notification);
    }
}
