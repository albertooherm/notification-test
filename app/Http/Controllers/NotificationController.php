<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $logs = NotificationLog::with('user')->orderBy('id', 'asc')->paginate(10);
        return view('notifications.index', compact('logs'));
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'message' => 'required',
        ]);

        $category = $request->input('category');
        $message = $request->input('message');

        $notificationSent = $this->notificationService->sendNotificationToSubscribers($category, $message);

        if ($notificationSent) {

            return back()->with('success', 'Notifications sent successfully!');
        } else {

            return back()->with('error', 'Failed to send notifications. Please try again.');
        }
    }
}
