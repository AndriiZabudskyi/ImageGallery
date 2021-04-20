<?php

namespace App\Repositories\Interfaces;

use App\Image;

interface ImageRepositoryInterface
{
    /**
     * @param string $title
     * @param string $path
     * @return mixed
     */
    public function createImage(string $title, string $path);

    /**
     * @param Image $image
     * @param int $tagId
     * @return mixed
     */
    public function attachTag(Image $image, int $tagId);

    /**
     * @param int $count
     * @return mixed
     */
    public function getImagesWithPagination(int $count);

    /**
     * @param string $filter
     * @param int $count
     * @return mixed
     */
    public function getImagesByFilterWithPagination(string $filter, int $count);
}