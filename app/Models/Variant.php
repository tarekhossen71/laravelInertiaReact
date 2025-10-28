<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'sleeve_type',
        'collar_type',
        'price',
        'stock_qty',
    ];

    protected $casts = [
        'size' => 'array',
        'color' => 'array',
        'sleeve_type' => 'array',
        'collar_type' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
