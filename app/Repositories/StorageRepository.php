<?php

namespace App\Repositories;

use App\Repositories\Interfaces\StorageRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageRepository implements StorageRepositoryInterface
{
    /**
     * @param UploadedFile $image
     * @return bool|mixed
     */
    public function putImageToLocalStorage(UploadedFile $image)
    {
        return Storage::disk('local')->put('public/images', $image, 'public');
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function getLocalStoragePublicUrl(string $path)
    {
        return Storage::url($path);
    }
}