<?php

namespace App\Repositories\Admin\Article;

interface ArticleRepositoryInterface
{
    public function getAll();

    public function getArticleCategories();

    public function getTags();
}
