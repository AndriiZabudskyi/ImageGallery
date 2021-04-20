<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\UploadedFile;

interface StorageRepositoryInterface
{
    /**
     * Put UploadedFile to local storage
     *
     * @param $file
     * @return mixed
     */
    public function putFileToLocalStorage(UploadedFile $file);

    /**
     * Get local storage public url by storage path (start with 'public/')
     *
     * @param string $path - storage path (start with '\storage\')
     * @return mixed
     */
    public function getLocalStoragePublicUrl(string $path);
}