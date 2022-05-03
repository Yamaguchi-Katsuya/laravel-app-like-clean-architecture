<?php

namespace App\Http\UseCases\Admin\Article;

use App\Enums\Status;
use App\Repositories\Admin\Article\ArticleRepositoryInterface AS ArticleRepository;
use stdClass;

class CreateAction
{
    public function __construct(
        private ArticleRepository $articleRepository
    ) {}

    /**
     * @return object
     */
    public function invoke(): object
    {
        $createFormData = new stdClass;
        $createFormData->masterItems = new stdClass;
        $createFormData->masterItems->statusList = Status::toSelectArray();
        $createFormData->masterItems->articleCategories = $this->articleRepository->getArticleCategories();
        $createFormData->masterItems->tags = $this->articleRepository->getTags();
        return $createFormData;
    }
}
