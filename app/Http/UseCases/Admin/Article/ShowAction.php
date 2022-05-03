<?php

namespace App\Http\UseCases\Admin\Article;

use App\Models\Article;
use App\Repositories\Admin\Article\ArticleRepositoryInterface AS ArticleRepository;

class ShowAction
{
    public function __construct(
        private ArticleRepository $articleRepository
    ) {}

    /**
     * @return Article
     */
    public function invoke(int $id): Article
    {
        return Article::with(['articleCategory', 'tags'])->findOrFail($id);
    }
}
