<?php

namespace App\Http\Requests\Admin\Article;

use App\Enums\Status;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:30'
            ],
            'body' => [
                'required',
                'string',
                'max:1000'
            ],
            'article_category_id' => [
                'required',
                'integer',
                'exists:article_categories,id'
            ],
            'main_image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,gif'
            ],
            'status' => [
                'required',
                'integer',
                new Enum(Status::class)
            ],
            'published_at' => [
                'required',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'article_category_id' => 'カテゴリー',
            'main_image' => 'メイン画像',
            'status' => 'ステータス',
            'published_at' => '公開日時',
        ];
    }

    /**
     * @return Article
     */
    public function makeArticle(): Article
    {
        $article = new Article($this->validated());
        $article->main_image = $this->main_image->getClientOriginalName();
        return $article;
    }
}
