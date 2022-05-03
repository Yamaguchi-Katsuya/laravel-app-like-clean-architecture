<?php

namespace App\Http\UseCases\Admin\Article;

use App\Models\Article;

class UpdateAction
{
    /**
     * @param Article $article
     * @return Article
     */
    public function invoke(Article $article): Article
    {
        $article->save();
        return $article;
    }
}
