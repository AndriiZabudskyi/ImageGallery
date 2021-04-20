<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Tag;

class TagRepository implements TagRepositoryInterface
{
    public function getOrCreateTag(string $name)
    {
        return Tag::firstOrCreate(['name' => $name]);
    }

    public function getAllTags() {
        return Tag::select('name')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toArray();
    }
}