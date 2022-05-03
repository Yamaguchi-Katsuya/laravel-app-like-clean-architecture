<x-admin.layout>

<h1>一覧画面</h1>
<p><a href="{{ route('admin.articles.create') }}">新規追加</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<div class="mt-5">
    <table class="table">
        <tr>
            <th>タイトル</th>
            <th>カテゴリー</th>
            <th>タグ</th>
            <th>ステータス</th>
            <th>公開日時</th>
            <th>詳細</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->articleCategory->name }}</td>
            <td>
                @foreach ($article->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </td>
            <td>{{ $article->status->label() }}</td>
            <td>{{ $article->published_at->format('Y/m/d H:i:s') }}</td>
            <th><a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-primary btn-sm">詳細</a></th>
            <th><a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-success btn-sm">編集</a></th>
            <th>
                <form action="{{ route('admin.articles.destroy', $article->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" name="">
                        削除
                    </button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
</div>

</x-admin.layout>
