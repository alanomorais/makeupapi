<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'brand',
        'name',
        'price',
        'price_sign',
        'currency',
        'image_link',
        'product_link',
        'website_link',
        'description',
        'rating',
        'category',
        'product_type',
        'created_at',
        'updated_at',
        'product_api_url',
        'api_featured_image',
    ];

    public function ProductColor()
    {
        return $this->hasMany(ProductColor::class);
    }
}
