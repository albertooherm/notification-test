<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationLogController;

Route::get('/', function () {
    return  view('notifications.form');
});
Route::get('/notification/form', [NotificationController::class, 'showForm']);
Route::post('/notification/send', [NotificationController::class, 'sendNotification']);
Route::get('/notification/logs', [NotificationLogController::class, 'index'])->name('notification.logs');;



