<?php

namespace App\Services\Interfaces;

interface ImageGalleryInterface
{
    /**
     * Store all image related information
     *
     * @param array $data
     * @return mixed
     */
    public function addImagesToGallery(array $data);

    /**
     * Get Images with pagination
     *
     * @param int $count - count of records per page (default = 15)
     * @return mixed
     */
    public function getAllImages(int $count = 15);

    /**
     * Get Images by filter
     *
     * @param string $filter - filter query
     * @param int $count - count of records per page (default = 15)
     * @return mixed
     */
    public function getImagesByFilter(string $filter, int $count = 15);
}
