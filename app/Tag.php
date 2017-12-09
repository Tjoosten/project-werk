<?php

namespace ActivismeBe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['author_id', 'name', 'description'];

    protected $attributes = [
        'description' => 'Er is geen beschrijving gegeven voor de categorie',
        'author_id'   => '0'
    ];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
