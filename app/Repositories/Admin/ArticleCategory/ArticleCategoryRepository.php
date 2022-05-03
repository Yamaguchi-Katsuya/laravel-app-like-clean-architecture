<?php

namespace App\Repositories\Admin\ArticleCategory;

use App\Models\ArticleCategory;

class ArticleCategoryRepository implements ArticleCategoryRepositoryInterface
{
    public function getAll()
    {
        return ArticleCategory::all();
    }
}
