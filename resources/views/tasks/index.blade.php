<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class='index'>
        <h1>タスク一覧</h1>
        @foreach ($tasks as $task)
            <div class="index-item">
                <a href="tasks/{{ $task->id }}">{{ $task->title }}</a>
                <form action="/tasks/{{ $task->id }}" method="post" class="index-item-delete-button">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="削除する">
                </form>
            </div>
        @endforeach
    </div>

    
    <h1>新規タスク登録</h1>
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

    <form action="/tasks" method="post">
        @csrf
        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>
        <br>
        <div>
            <label for="body">内容</label>
            <textarea name="body" class="body">{{ old('body') }}</textarea>
        </div>
        <input type="submit" value="Create Task">
    </form>
</body>
</html>
