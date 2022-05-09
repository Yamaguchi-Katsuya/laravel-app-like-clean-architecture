<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'article_category_id',
        'main_image',
        'status',
        'published_at',
    ];

    protected $casts = [
        'status' => Status::class
    ];

    protected $dates = [
        'published_at'
    ];


    /**
     * @return BelongsTo
     */
    public function articleCategory(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,
            ArticleTag::class,
            'article_id',
            'tag_id');
    }
}
