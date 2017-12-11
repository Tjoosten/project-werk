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

/**
 * Het artikel databank model. 
 * 
 * @author    Tim Joosten <Topairy@gmail.com>
 * @copyright 2017 Tim Joosten
 */
class Article extends Model implements HasMediaConversions
{
    use HasMediaTrait, HasSlug;

    /**
     * De mass-assign velden voor de databank table.
     *
     * @var array
     */
    protected $fillable = ['slug', 'publish_date', 'is_published', 'title', 'message', 'author_id'];

    /**
     * De datum velden in de database.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'publish_date'];

    /**
     * De autheurs data voor het artikel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')
            ->withDefault(['name' => 'Anonieme gebruiker']);
    }

    /**
     * Data relatie voor de categorieen v/h artikel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * De configuratie voor de de afbeeldingen van het artikel. 
     *
     * 1) Herschaal afbeelding naar 750x220 formaat en optimalisatie
     * 2) Herschaal afbeelding naar 100x100 formaat en optimalisatie
     * 
     * @param  Media|bool $media Het gegeven media item.
     * @return void
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb-image') // (1)
            ->width(750)
            ->height(220)
            ->optimize()
            ->performOnCollections('images');

        $this->addMediaConversion('thumb-100') // (2)
            ->width('100')
            ->height('100')
            ->optimize()
            ->performOnCollections('images');
    }

    /**
     * Slug configuratie voor het artikel.
     *
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);
    }
}
