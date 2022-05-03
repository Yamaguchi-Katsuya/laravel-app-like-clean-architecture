<x-admin.layout>

<h1>一覧画面</h1>
<p><a href="{{ route('admin.article-categories.create') }}">新規追加</a></p>

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
        @foreach ($articleCategories as $articleCategory)
        <tr>
            <td>{{ $articleCategory->name }}</td>
            <th><a href="{{ route('admin.article-categories.show', $articleCategory->id)}}">詳細</a></th>
            <th><a href="{{ route('admin.article-categories.edit', $articleCategory->id)}}">編集</a></th>
            <th>
                <form action="{{ route('admin.article-categories.destroy', $articleCategory->id)}}" method="POST">
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
