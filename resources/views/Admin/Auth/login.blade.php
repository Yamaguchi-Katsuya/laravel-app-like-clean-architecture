<x-admin.layout>
    <x-slot name="title">
        ログイン画面
    </x-slot>

    <h1>ログイン</h1>

    {{ Form::open(['route' =>  ['admin.login'], 'method' => 'post']) }}
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

</x-admin.layout>
