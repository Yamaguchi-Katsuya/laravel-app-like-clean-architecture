<?php

namespace App\Repositories\Admin\Tag;

interface TagRepositoryInterface
{
    public function getAll();

    public function getById(int $id);
}
