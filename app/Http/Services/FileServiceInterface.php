<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

interface FileServiceInterface
{
    /**
     * @param string $dirPath
     * @param UploadedFile|null $file
     * @return bool
     */
    public function put(
        string $dirPath,
        UploadedFile|null $file
    ): bool;

    /**
     * @param string $dirPath
     * @param UploadedFile|null $file
     * @param string $fileName
     * @return bool
     */
    public function putFileAs(
        string $dirPath,
        UploadedFile|null $file,
        string $fileName
    ): bool;

    /**
     * @param string $filePath
     * @return string
     */
    public function getURL(
        string $filePath
    ): string;
}
