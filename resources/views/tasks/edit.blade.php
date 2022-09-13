<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>
<body>
    <h1>投稿タスク編集</h1>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" value = {{ old('title', $task->title) }}>
        </div>
        <br>
        <div>
            <label for="body">内容</label><br>
            <textarea name="body" class="body">{{ old('body', $task->body) }}</textarea>
        </div>
        <input type="submit" value="Update Task">
        <button onclick="location.href='/tasks/{{ $task->id }}'">詳細へ戻る</button>
    </form>
</body>
</html>
