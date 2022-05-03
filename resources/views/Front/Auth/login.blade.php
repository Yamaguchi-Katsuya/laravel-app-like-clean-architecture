<x-front.layout>

<h1>ログイン</h1>

{{ Form::open(['route' =>  ['login'], 'method' => 'post']) }}
    @csrf

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

    {{ Form::frontFormSubmit('ログイン') }}
{{ Form::close() }}

    </x-front.layout>
