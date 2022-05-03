<?php

namespace App\Http\UseCases\Admin\Article;

use App\Models\Article;

class StoreAction
{
    /**
     * @param Article $article
     * @param array $tags
     * @return Article
     */
    public function invoke(Article $article, array $tags): Article
    {
        $article->save();
        $article->tags()->sync($tags ?? []);
        return $article;
    }
}
