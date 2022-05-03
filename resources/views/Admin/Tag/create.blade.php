<x-admin.layout>
<h1>新規作成画面</h1>
<p><a href="{{ route('admin.tags.index')}}">一覧画面</a></p>

<div class="card mt-5">
    <div class="card-header">
        新規作成
    </div>

    <div class="card-body">

        {{ Form::open(['route' =>  ['tags.store'], 'method' => 'post']) }}
            @csrf
            {{ Form::adminFormText(
                'name',
                'タグ名',
                old('name'),
                [
                    'id' => 'name',
                    'placeholder' => 'タグ名',
                    'required' => 'required'
                ]
            ) }}
            {{ Form::adminFormSubmit('登録する') }}
        {{ Form::close() }}
    </div>

</x-admin.layout>
