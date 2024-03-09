<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone_number', 'subscribed_categories', 'notification_channels'
    ];

    protected $casts = [
        'subscribed_categories' => 'array',
        'notification_channels' => 'array',
    ];

}
