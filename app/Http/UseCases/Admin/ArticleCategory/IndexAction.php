<?php

namespace App\Http\UseCases\Admin\ArticleCategory;

use App\Repositories\Admin\ArticleCategory\ArticleCategoryRepositoryInterface AS ArticleCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    public function __construct(
        private ArticleCategoryRepository $articleCategoryRepository
    ) {}

    /**
     * @return Collection
     */
    public function invoke(): Collection
    {
        return $this->articleCategoryRepository->getAll();
    }
}
