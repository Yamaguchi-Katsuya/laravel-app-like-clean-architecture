<?php

namespace App\Http\UseCases\Admin\Tag;

use App\Enums\Status;
use App\Models\Article;
use App\Repositories\Admin\Article\ArticleRepositoryInterface AS ArticleRepository;
use stdClass;

class EditAction
{
    public function __construct(
        private ArticleRepository $articleRepository
    ) {}

    /**
     * @return object
     */
    public function invoke(int $id): object
    {
        $editFormData = new stdClass;
        $editFormData->article = Article::findOrFail($id);
        $editFormData->masterItems = new stdClass;
        $editFormData->masterItems->statusList = Status::cases();
        $editFormData->masterItems->articleCategories = $this->articleRepository->getArticleCategories();
        return $editFormData;
    }
}
