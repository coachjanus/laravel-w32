<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
            ];
    }

    protected $fillable = [
        'name',
        'description',
        'status',
        'price',
        'category_id',
        'brand_id',
        'cover'
    ];

    public $casts = [
        'status' => ProductStatus::class
    ];

    public function scopeSearch($query, $value) {
        $query->where('name', 'like', "%{$value}%")
        ->orWhere('price', 'like', "%{$value}%");
    }

    public function brand() {
        return $this->belongsTo(related: Brand::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopePopular($query) {
        $query->withCount('stars')
        ->orderBy('stars_count', 'desc');
    }

    public function stars() {
        return $this->belongsToMany(User::class, 'product_star')->withTimestamps();
    }

}
