<?php

namespace App\Constants;

class FilePathFormats
{
    private const BUCKET_NAME = 'static';

    public const ARTICLE_IMG_DIR = self::BUCKET_NAME . '/article/%d';
    public const ARTICLE_IMG_PATH = self::BUCKET_NAME . '/article/%d/%s';
}
