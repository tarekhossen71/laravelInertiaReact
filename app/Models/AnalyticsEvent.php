<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    use HasFactory;

    protected $fillable = ['event_name', 'user_ip', 'page_url', 'session_id', 'extra_data'];

    protected $casts = [
        'extra_data' => 'array',
    ];
}
