<!-- resources/views/post/index.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    <ul>
    @foreach ($posts as $post)
        <li>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <small>投稿日時: {{ $post->created_at }}</small>
        </li>
    @endforeach
    </ul>

    <a href="{{ route('posts.create') }}">新規投稿作成</a>
</body>
</html>
