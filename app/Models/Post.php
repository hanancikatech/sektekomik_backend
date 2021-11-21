<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $guarded = [];


    public function manga(): BelongsTo
    {
        return $this->belongsTo(Manga::class , 'manga_id');
    }


    public function createdBy() : BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('post')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('manga')->singleFile();
        $this->addMediaCollection('multi_manga_image');
    }
}
