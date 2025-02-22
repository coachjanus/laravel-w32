<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Models\Scopes\PublishedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            ];
    }

    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id'
    ];

    public $casts = [
        'status' => PostStatus::class,
    ];

    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope);
    }
    

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
