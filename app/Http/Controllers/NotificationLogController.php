<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationLog;


class NotificationLogController  extends Controller
{
    public function index()
    {
        $logs = NotificationLog::latest()->get();
        return view('notifications.logs', compact('logs'));
    }
}
