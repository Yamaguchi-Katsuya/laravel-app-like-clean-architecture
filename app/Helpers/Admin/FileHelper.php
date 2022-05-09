<?php

namespace App\Helpers\Admin;

use App\Http\Services\FileServiceInterface;
use Illuminate\Support\Facades\App;

class FileHelper
{
    /**
     * @param string $filePath
     * @return string
     */
    public static function getURL(string $filePath): string
    {
        $fileService = App::make(FileServiceInterface::class);
        return $fileService->getURL($filePath);
    }
}
