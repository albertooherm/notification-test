<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
    use HasFactory;

    protected $table = "notification_logs";
    protected $fillable = [
        'user_id', 'category', 'type', 'message', 'notification_channel', 'sent_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
