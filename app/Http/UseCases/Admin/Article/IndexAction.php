<?php

namespace App\Http\UseCases\Admin\Article;

use App\Repositories\Admin\Article\ArticleRepositoryInterface AS ArticleRepository;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    public function __construct(
        private ArticleRepository $articleRepository
    ) {}

    /**
     * @return Collection
     */
    public function invoke(): Collection
    {
        return $this->articleRepository->getAll();
    }
}
