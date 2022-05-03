<?php

namespace App\Http\UseCases\Admin\Tag;

use App\Repositories\Admin\Tag\TagRepositoryInterface AS TagRepository;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    public function __construct(
        private TagRepository $tagRepository
    ) {}

    /**
     * @return Collection
     */
    public function invoke(): Collection
    {
        return $this->tagRepository->getAll();
    }
}
