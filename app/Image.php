<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $guarded = [];

    public function tags() {
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }
}
