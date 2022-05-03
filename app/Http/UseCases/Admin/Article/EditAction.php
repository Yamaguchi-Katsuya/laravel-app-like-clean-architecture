<?php

namespace App\Http\UseCases\Admin\Article;

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
        $editFormData->article = Article::with(['articleCategory', 'tags:id'])->find($id);
        $editFormData->masterItems = new stdClass;
        $editFormData->masterItems->statusList = Status::toSelectArray();
        $editFormData->masterItems->articleCategories = $this->articleRepository->getArticleCategories();
        $editFormData->masterItems->tags = $this->articleRepository->getTags();
        return $editFormData;
    }
}
