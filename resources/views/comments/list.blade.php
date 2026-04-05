<!DOCTYPE html>
<html>
<head>
    <title>掲示板</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        textarea {
            width: 100%;
            height: 80px;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #333;
            color: #fff;
            border: none;
        }

        .comment-time {
            font-size: 12px;
            color: #888;
            margin-bottom: 5px;
        }

        .comment-text {
            font-size: 14px;
        }

        .comment {
            padding: 10px 0;
        }

        .comment + .comment {
            border-top: 1px solid #ddd;
            margin-top: 30px;
            padding-top: 10px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .delete-btn {
            font-size: 12px;
            padding: 2px 6px;
            background: #171616ff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .edit-link {
            font-size: 12px;
            text-decoration: none;
            color: #171819ff;
        }

        .delete-btn {
            font-size: 12px;
            padding: 2px 6px;
            background: #171819ff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>


</head>
<body>

<div class="container">

<h1>掲示板</h1>

<!-- 一覧表示 -->
@foreach ($comments as $comment)
    <div class="comment">

        <div class="comment-header">

            <div class="comment-time">
                {{ $comment->created_at->format('Y/m/d H:i') }}
            </div>

            <div class="actions">
                <a href="/edit/{{ $comment->id }}" class="edit-link">
                    編集
                </a>

                <form action="/delete/{{ $comment->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn" onclick="return confirm('削除する？')">
                        削除
                    </button>
                </form>
            </div>

        </div>

        <div class="comment-text">
            {{ $comment->content }}
        </div>

    </div>
@endforeach

<!--下線 -->
<hr>

<!-- 投稿フォーム -->
<form method="POST" action="/submit">
    @csrf
    <textarea name="content"></textarea>
    <button type="submit">送信</button>
</form>



</body>
</html>