<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Tag;

class TagRepository implements TagRepositoryInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public function getOrCreateTag(string $name)
    {
        return Tag::firstOrCreate(['name' => $name]);
    }

    /**
     * @return mixed
     */
    public function getAllTags() {
        return Tag::select('name')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toArray();
    }
}