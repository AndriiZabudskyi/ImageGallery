<?php

namespace App\Repositories;

use App\Repositories\Interfaces\StorageRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageRepository implements StorageRepositoryInterface
{
    public function putFileToLocalStorage(UploadedFile $file)
    {
        return Storage::disk('local')->put('public/images', $file, 'public');
    }

    public function getLocalStoragePublicUrl(string $path)
    {
        return Storage::url($path);
    }
}