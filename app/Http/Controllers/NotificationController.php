<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NotificationLog;
use App\Services\NotificationService;


class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function showForm()
    {
        return view('notifications.form');
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'message' => 'required'
        ]);

        $category = $request->input('category');
        $message = $request->input('message');

        $this->notificationService->sendNotificationToSubscribers($category, $message);

        return back()->with('success', 'Notifications sent successfully!');
    }
}
