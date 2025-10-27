<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sku',
        'status',
        'seo_title',
        'seo_meta_tags',
        'seo_description',
        'main_image',
        'gallery_images',
        'created_by',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
