<x-admin.layout>

<h1>一覧画面</h1>
<p><a href="{{ route('admin.tags.create') }}">新規追加</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<div class="mt-5">
    <table class="table">
        <tr>
            <th>タイトル</th>
            <th>詳細</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->name }}</td>
            <th><a href="{{ route('admin.tags.show', $tag->id)}}">詳細</a></th>
            <th><a href="{{ route('admin.tags.edit', $tag->id)}}">編集</a></th>
            <th>
                <form action="{{ route('admin.tags.destroy', $tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="" value="削除">
                </form>
            </th>
        </tr>
        @endforeach
    </table>
</div>

</x-admin.layout>
