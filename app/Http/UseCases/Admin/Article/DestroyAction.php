<?php

namespace App\Http\UseCases\Admin\Article;

use App\Models\Article;

class DestroyAction
{
    /**
     * @param int $id
     * @return void
     */
    public function invoke(int $id): void
    {
        Article::destroy($id);
    }
}
