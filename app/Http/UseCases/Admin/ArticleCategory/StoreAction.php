<?php

namespace App\Http\UseCases\Admin\ArticleCategory;

use App\Models\ArticleCategory;

class StoreAction
{
    /**
     * @param ArticleCategory $article
     * @return ArticleCategory
     */
    public function invoke(ArticleCategory $articleCategory): ArticleCategory
    {
        $articleCategory->save();
        return $articleCategory;
    }
}
