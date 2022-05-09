<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class S3Service implements FileServiceInterface
{
    /**
     * @param string $dirPath
     * @param UploadedFile|null $file
     * @return bool
     */
    public function put(string $dirPath, UploadedFile|null $file): bool
    {
        return Storage::disk('s3')->put($dirPath, $file);
    }

    /**
     * @param string $dirPath
     * @param UploadedFile|null $file
     * @param string $fileName
     * @return bool
     */
    public function putFileAs(string $dirPath, UploadedFile|null $file, string $fileName): bool
    {
        return Storage::disk('s3')->putFileAs($dirPath, $file, $fileName);
    }

    /**
     * @param string $filePath
     * @return string
     */
    public function getURL(string $filePath): string
    {
        return Storage::disk('s3')->url($filePath);
    }
}
