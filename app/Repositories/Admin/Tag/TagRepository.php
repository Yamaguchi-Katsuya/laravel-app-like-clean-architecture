<?php

namespace App\Repositories\Admin\Tag;

use App\Models\Tag;

class TagRepository implements TagRepositoryInterface
{
    /**
     * @return Collection|static[]
     */
    public function getAll()
    {
        return Tag::all();
    }

    /**
     * @param int $id
     * @return Tag
     */
    public function getById(int $id): Tag
    {
        return Tag::findOrFail($id);
    }
}
