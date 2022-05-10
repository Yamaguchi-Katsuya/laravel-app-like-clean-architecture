<x-admin.layout>

<h1>詳細画面</h1>
<p><a href="{{ route('admin.articles.index')}}">一覧画面</a></p>

<div class="mt-5">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>メイン画像</th>
            <th>タイトル</th>
            <th>カテゴリー</th>
            <th>タグ</th>
            <th>ステータス</th>
            <th>公開日時</th>
        </tr>
        <tr>
            <td>{{ $article->id }}</td>
            <td class="w-25">
                <img
                    class="img-fluid img-thumbnail"
                    src="{{ AdminFileHelper::getURL(sprintf(FilePathFormats::ARTICLE_IMG_PATH, $article->id, $article->main_image)) }}"
                    alt=""
                >
            </td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->articleCategory->name }}</td>
            <td>
                @foreach ($article->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </td>
            <td>{{ $article->status->label() }}</td>
            <td>{{ $article->published_at->format('Y/m/d H:i:s') }}</td>
        </tr>
    </table>
</div>

</x-admin.layout>
