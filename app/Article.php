<?php

namespace ActivismeBe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model implements HasMediaConversions
{
    use HasMediaTrait, HasSlug;

    protected $fillable = ['slug', 'publish_date', 'is_published', 'title', 'message', 'author_id'];

    protected $dates = [
        'created_at',
        'updated_at',
        'publish_date'
    ];

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
            ->optimize()
            ->performOnCollections('images');;
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
