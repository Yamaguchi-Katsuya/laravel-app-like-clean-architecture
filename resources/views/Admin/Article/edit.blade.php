<x-admin.layout>

<h1>編集画面</h1>
<p><a href="{{ route('admin.articles.index')}}">一覧画面</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<div class="card mt-5">
    <div class="card-header">
        編集
    </div>
    <div class="card-body">
        {{ Form::open(['route' =>  ['admin.articles.update', $formData->article->id], 'method' => 'post']) }}
            @csrf
            @method('PUT')
            {{ Form::adminFormText(
                'title',
                'タイトル',
                $formData->article->title,
                [
                    'id' => 'title',
                    'placeholder' => '記事タイトル',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormTextarea(
                'body',
                '本文',
                $formData->article->body,
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
                $formData->article->article_category_id,
                [
                    'id' => 'article_category_id',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormCheckbox(
                'tags',
                'タグ',
                $formData->masterItems->tags,
                $formData->article->tags ?? [],
            ) }}

            {{ Form::adminFormSelect(
                'status',
                'ステータス',
                $formData->masterItems->statusList,
                $formData->article->status->value,
                [
                    'id' => 'status',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormDatetime(
                'published_at',
                '公開日時',
                $formData->article->published_at,
                [
                    'id' => 'published_at',
                    'required' => 'required'
                ]
            ) }}

            {{ Form::adminFormSubmit(
                '編集する'
            ) }}
        {{ Form::close() }}
    </div>
</div>

</x-admin.layout>
