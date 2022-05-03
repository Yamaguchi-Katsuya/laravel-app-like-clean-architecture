<x-admin.layout>

<h1>新規作成画面</h1>
<p><a href="{{ route('admin.article-categories.index')}}">一覧画面</a></p>

{{ Form::open(['route' =>  ['article-categories.store'], 'method' => 'post']) }}
    @csrf
    {{ Form::adminFormText(
        'name',
        'カテゴリー名',
        old('name'),
        [
            'id' => 'name',
            'placeholder' => 'カテゴリー名',
            'required' => 'required'
        ]
    ) }}
    {{ Form::adminFormSubmit('登録する') }}
{{ Form::close() }}

</x-admin.layout>
