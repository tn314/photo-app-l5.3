<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getImageUrlAttribute()
    {
        if (str_contains($this->image, 'http://lorempixel.com')) {
            return $this->image;
        }

        return url("img/{$this->image}");
    }
}
