<x-admin.layout>
    <h1>詳細画面</h1>
    <p><a href="{{ route('admin.tags.index') }}">一覧画面</a></p>
    <div class="mt-5">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>タグ名</th>
                <th>作成日時</th>
                <th>更新日時</th>
            </tr>
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->created_at->format('Y/m/d H:i:s') }}</td>
                <td>{{ $tag->updated_at->format('Y/m/d H:i:s') }}</td>
            </tr>
        </table>
    </div>
</x-admin.layout>
