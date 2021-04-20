<?php

namespace App\Services\Interfaces;

interface ImageGalleryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function addImagesToGallery(array $data);

    /**
     * @param int $count
     * @return mixed
     */
    public function getAllImages(int $count = 15);

    /**
     * @param string $filter
     * @param int $count
     * @return mixed
     */
    public function getImagesByFilter(string $filter, int $count = 15);
}
