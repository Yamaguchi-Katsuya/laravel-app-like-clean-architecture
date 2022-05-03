<?php

namespace App\Http\UseCases\Admin\Tag;

use App\Models\Tag;

class StoreAction
{
    /**
     * @param Tag $tag
     * @return Tag
     */
    public function invoke(Tag $tag): Tag
    {
        $tag->save();
        return $tag;
    }
}
