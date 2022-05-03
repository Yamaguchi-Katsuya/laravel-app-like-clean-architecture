<?php

namespace App\Repositories\Admin\Article;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection AS SupportCollection;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @return Collection|static[]
     */
    public function getAll()
    {
        return Article::with(['articleCategory', 'tags'])->get();
    }

    /**
     * @return SupportCollection
     */
    public function getArticleCategories(): SupportCollection
    {
        return ArticleCategory::get(['id', 'name'])->pluck('name', 'id');
    }

    /**
     * @return SupportCollection
     */
    public function getTags(): SupportCollection
    {
        return Tag::get(['id', 'name'])->pluck('name', 'id');
    }
}
