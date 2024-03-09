<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'type', 'message', 'notification_channel', 'sent_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

