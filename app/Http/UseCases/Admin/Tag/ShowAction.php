<?php

namespace App\Http\UseCases\Admin\Tag;

use App\Models\Tag;
use App\Repositories\Admin\Tag\TagRepositoryInterface AS TagRepository;

class ShowAction
{
    public function __construct(
        private TagRepository $tagRepository
    ) {}

    /**
     * @param int $id
     * @return Tag
     */
    public function invoke(int $id): Tag
    {
        return $this->tagRepository->getById($id);
    }
}
