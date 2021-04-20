<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\UploadedFile;

interface StorageRepositoryInterface
{
    /**
     * @param $image
     * @return mixed
     */
    public function putImageToLocalStorage(UploadedFile $image);

    /**
     * @param string $path
     * @return mixed
     */
    public function getLocalStoragePublicUrl(string $path);
}