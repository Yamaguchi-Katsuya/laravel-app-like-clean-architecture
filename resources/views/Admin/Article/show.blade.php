<h1>詳細画面</h1>
<p><a href="{{ route('admin.articles.index')}}">一覧画面</a></p>

<table border="1">
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>カテゴリー</th>
        <th>タグ</th>
        <th>ステータス</th>
        <th>公開日時</th>
        <th>作成日時</th>
        <th>更新日時</th>
    </tr>
    <tr>
        <td>{{ $article->id }}</td>
        <td>{{ $article->title }}</td>
        <td>{{ $article->articleCategory->name }}</td>
        <td>
            @foreach ($article->tags as $tag)
                {{ $tag->name }}
            @endforeach
        </td>
        <td>{{ $article->status->label() }}</td>
        <td>{{ $article->published_at->format('Y/m/d H:i:s') }}</td>
        <td>{{ $article->created_at->format('Y/m/d H:i:s') }}</td>
        <td>{{ $article->updated_at->format('Y/m/d H:i:s') }}</td>
    </tr>
</table>
