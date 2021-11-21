<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Manga extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'author',
        'slug',
    ];

    protected $casts = [
        'release' => 'datetime:Y-m-d'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'manga_category');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class , 'manga_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('manga')->singleFile();
        $this->addMediaCollection('multi_manga_image');
    }
}
