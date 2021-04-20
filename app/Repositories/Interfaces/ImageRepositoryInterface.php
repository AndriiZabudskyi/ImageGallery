<?php

namespace App\Repositories\Interfaces;

use App\Image;

interface ImageRepositoryInterface
{
    /**
     * Create new instance of Image
     *
     * @param string $title
     * @param string $path
     * @return mixed
     */
    public function createImage(string $title, string $path);

    /**
     * Attach tag to exist Image
     *
     * @param Image $image
     * @param int $tagId
     * @return mixed
     */
    public function attachTag(Image $image, int $tagId);

    /**
     * Get Images with pagination
     *
     * @param int $count - count of records per page
     * @return mixed
     */
    public function getImagesWithPagination(int $count);

    /**
     * Get Images by filter and with pagination
     *
     * @param string $filter - filter query
     * @param int $count - count of records per page
     * @return mixed
     */
    public function getImagesByFilterWithPagination(string $filter, int $count);
}