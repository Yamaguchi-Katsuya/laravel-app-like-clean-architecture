<?php

namespace App\Http\Requests\Admin\ArticleCategory;

use App\Models\ArticleCategory;
use Illuminate\Foundation\Http\FormRequest;

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
            'name' => [
                'required',
                'string',
                'max:30'
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'カテゴリ名',
        ];
    }

    /**
     * @return ArticleCategory
     */
    public function makeArticleCategory(): ArticleCategory
    {
        return new ArticleCategory($this->validated());
    }
}
