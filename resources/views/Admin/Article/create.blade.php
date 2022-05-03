<x-admin.layout>

<h1>新規作成画面</h1>
<p><a href="{{ route('admin.articles.index')}}">一覧画面</a></p>

<div class="card mt-5">
    <div class="card-header">
        新規作成
    </div>

    <div class="card-body">
        {{ Form::open(['route' =>  ['articles.store'], 'method' => 'post']) }}
            @csrf
            {{ Form::adminFormText(
                'title',
                'タイトル',
                old('title'),
                [
                    'id' => 'title',
                    'placeholder' => '記事タイトル',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormTextarea(
                'body',
                '本文',
                old('body'),
                [
                    'id' => 'body',
                    'placeholder' => '本文',
                    'rows' => '3',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormSelect(
                'article_category_id',
                'カテゴリー',
                $formData->masterItems->articleCategories,
                old('article_category_id'),
                [
                    'id' => 'article_category_id',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormCheckbox(
                'tags',
                'タグ',
                $formData->masterItems->tags,
                old('tags'),
            ) }}

            {{ Form::adminFormSelect(
                'status',
                'ステータス',
                $formData->masterItems->statusList,
                old('status'),
                [
                    'id' => 'status',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormDatetime(
                'published_at',
                '公開日時',
                old('published_at'),
                [
                    'id' => 'published_at',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormSubmit('登録する') }}
        {{ Form::close() }}
    </div>
</div>

</x-admin.layout>
