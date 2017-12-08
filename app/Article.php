<?php

namespace ActivismeBe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Spatie\Sluggable\HasSlug;

class Article extends Model implements HasMediaConversions
{
    use HasMediaTrait, HasSlug;

    protected $fillable = ['slug', 'publish_date', 'is_published', 'title', 'message', 'author_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')
            ->withDefault(['name' => 'Anonieme gebruiker']);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb-image')
            ->width(750)
            ->height(300)
            ->optimize();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);
    }
}
