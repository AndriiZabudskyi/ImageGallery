<?php

namespace App\Services;

use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\StorageRepository;
use App\Services\Interfaces\ImageGalleryInterface;
use Illuminate\Support\Facades\Log;

class ImageGalleryService implements ImageGalleryInterface {

    /**
     * @var ImageRepositoryInterface
     */
    protected $imageRepository;

    /**
     * @var TagRepositoryInterface
     */
    protected $tagRepository;

    /**
     * @var StorageRepository
     */
    protected $storageRepository;

    /**
     * ImageGalleryService constructor.
     * @param ImageRepositoryInterface $imageRepository
     * @param TagRepositoryInterface $tagRepository
     * @param StorageRepository $storageRepository
     */
    public function __construct(
        ImageRepositoryInterface $imageRepository,
        TagRepositoryInterface $tagRepository,
        StorageRepository $storageRepository
    ) {
        $this->imageRepository = $imageRepository;
        $this->tagRepository = $tagRepository;
        $this->storageRepository = $storageRepository;
    }

    /**
     * @param array $data
     */
    public function addImagesToGallery(array $data)
    {
        foreach($data['images'] as $img) {
            $storagePath = $this->storageRepository->putImageToLocalStorage($img['image']);
            $publicPath = $this->storageRepository->getLocalStoragePublicUrl($storagePath);

            $image = $this->imageRepository->createImage($img['title'], $publicPath);

            foreach (explode(',', $img['tags']) as $tagName) {
                $tag = $this->tagRepository->getOrCreateTag($tagName);
                $this->imageRepository->attachTag($image, $tag->id);
            }
        }
    }

    /**
     * @param int $count
     * @return mixed
     */
    public function getAllImages(int $count = 15)
    {
        return $this->imageRepository->getImagesWithPagination($count);
    }

    /**
     * @param string $filter
     * @param int $count
     * @return mixed
     */
    public function getImagesByFilter(string $filter, int $count = 15)
    {
        return $this->imageRepository->getImagesByFilterWithPagination($filter, $count);
    }
}