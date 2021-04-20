<?php

namespace App\Repositories;

use App\Image;
use App\Repositories\Interfaces\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    public function createImage(string $title, string $path) {
        return Image::create(['title' => $title, 'path' => $path]);
    }

    public function attachTag(Image $image, int $tagId) {
        return $image->tags()->attach($tagId);
    }

    public function getImagesWithPagination(int $count) {
        return Image::orderBy('created_at', 'DESC')
            ->paginate($count);
    }

    public function getImagesByFilterWithPagination(string $filter, int $count) {
        return Image::whereHas('tags', function ($query) use ($filter ) {
            return $query->where('name', 'like', "%{$filter}%");
        })->orderBy('created_at', 'DESC')
            ->paginate($count);
    }
}
