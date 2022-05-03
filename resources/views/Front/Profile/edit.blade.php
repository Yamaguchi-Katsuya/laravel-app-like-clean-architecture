<x-front.layout>

<h1>プロフィール編集</h1>

{{ Form::open(['route' =>  ['user-profile-information.update'], 'method' => 'post']) }}
    @csrf
    @method('PUT')

    {{ Form::frontFormText(
        'name',
        'ユーザー名',
        old('name') ?? auth()->user()->name,
        [
            'id' => 'name',
            'placeholder' => 'ユーザー名',
            'required' => 'required'
        ]
    ) }}

    {{ Form::frontFormEmail(
        'email',
        'メールアドレス',
        old('email') ?? auth()->user()->email,
        [
            'id' => 'email',
            'placeholder' => 'test@test.com',
            'required' => 'required'
        ]
    ) }}

    {{ Form::frontFormSubmit('更新する') }}
{{ Form::close() }}

</x-front.layout>
