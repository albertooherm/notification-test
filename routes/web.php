<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/', [NotificationController::class, 'showForm'])->name('home');
Route::get('/notifications', [NotificationController::class, 'showForm'])->name('notifications.index');
Route::post('/notification/send', [NotificationController::class, 'sendNotification'])->name('notification.send');




