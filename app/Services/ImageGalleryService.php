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
    private $imageRepository;

    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * @var StorageRepository
     */
    private $storageRepository;

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

    public function addImagesToGallery(array $data)
    {
        foreach($data['images'] as $img) {
            $storagePath = $this->storageRepository->putFileToLocalStorage($img['image']);
            $publicPath = $this->storageRepository->getLocalStoragePublicUrl($storagePath);

            $image = $this->imageRepository->createImage($img['title'], $publicPath);

            foreach (explode(',', $img['tags']) as $tagName) {
                $tag = $this->tagRepository->getOrCreateTag($tagName);
                $this->imageRepository->attachTag($image, $tag->id);
            }
        }
    }

    public function getAllImages(int $count = 15)
    {
        return $this->imageRepository->getImagesWithPagination($count);
    }

    public function getImagesByFilter(string $filter, int $count = 15)
    {
        return $this->imageRepository->getImagesByFilterWithPagination($filter, $count);
    }
}