<!-- resources/views/posts/create.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規投稿作成</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>新規投稿作成フォーム</h1>

    <!-- バリデーションエラー表示 -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--成功メッセージ-->
    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- 投稿フォーム -->
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">タイトル:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="body">本文:</label><br>
            <textarea id="body" name="body" rows="6" required>{{ old('body') }}</textarea>
        </div>

        <div>
            <button type="submit">投稿する</button>
        </div>
    </form>
</body>
</html>
