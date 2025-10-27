<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'courier_name',
        'tracking_code',
        'delivery_status',
        'delivery_charge',
        'courier_response_log'
    ];

    protected $casts = [
        'courier_response_log' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
