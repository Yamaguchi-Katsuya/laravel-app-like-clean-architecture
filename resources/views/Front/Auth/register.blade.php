<x-front.layout>

<h1>新規登録</h1>

{{ Form::open(['route' =>  ['register'], 'method' => 'post']) }}
    @csrf
    {{ Form::frontFormText(
        'name',
        'ユーザー名',
        old('name'),
        [
            'id' => 'name',
            'placeholder' => 'ユーザー名',
            'required' => 'required'
        ]
    ) }}

    {{ Form::frontFormEmail(
        'email',
        'メールアドレス',
        old('email'),
        [
            'id' => 'email',
            'placeholder' => 'test@test.com',
            'required' => 'required'
        ]
    ) }}

    {{ Form::frontFormPassword(
        'password',
        'パスワード',
        [
            'id' => 'password',
            'required' => 'required'
        ]
    ) }}

    {{ Form::frontFormPassword(
        'password_confirmation',
        'パスワード確認',
        [
            'id' => 'password_confirmation',
            'required' => 'required'
        ]
    ) }}

    {{ Form::frontFormSubmit('新規登録') }}
{{ Form::close() }}

    </x-front.layout>
