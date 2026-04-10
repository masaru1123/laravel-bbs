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

        .header {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .header .logout-btn {
            background: none;
            border: none;
            color: #666;
            font-size: 14px;
            cursor: pointer;
            padding: 0;
        }

        .header .logout-btn:hover {
            text-decoration: underline;
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

        .actions {
            display: flex;
            gap: 5px;
        }

        .edit-link {
            font-size: 12px;
            text-decoration: none;
            color: #171819;
        }

        .delete-btn {
            font-size: 12px;
            padding: 2px 6px;
            background: #171819;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

</head>
<body>

<div class="container">

<!-- ① 右上ログイン導線 -->
<div class="header">

    @auth
        <!-- 左：ログインの位置 → ユーザー名 -->
        <span>{{ Auth::user()->name }}</span>

        <!-- 右：新規登録の位置 → ログアウト -->
        <form method="POST" action="/logout" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">ログアウト</button>
        </form>
    @else
        <!-- 未ログイン -->
        <a href="/login">ログイン</a>
        <a href="/register">新規登録</a>
    @endauth

</div>

<h1>掲示板</h1>

<!-- 一覧表示 -->
@foreach ($comments as $comment)
    <div class="comment">

        <div class="comment-header">

            <div class="comment-time">
                {{ $comment->created_at->format('Y/m/d H:i') }}
            </div>

            <!-- ② 自分だけ編集削除 -->
            @auth
                @if ($comment->user_id === Auth::id())
                    <div class="actions">
                        <a href="/edit/{{ $comment->id }}" class="edit-link">編集</a>

                        <form action="/delete/{{ $comment->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">削除</button>
                        </form>
                    </div>
                @endif
            @endauth

        </div>

        <div class="comment-text">
            {{ $comment->content }}
        </div>

    </div>
@endforeach

<hr>

<!-- ③ 投稿フォーム（ログイン限定） -->
@auth
    <form method="POST" action="/submit">
        @csrf
        <textarea name="content"></textarea>
        <button type="submit">送信</button>
    </form>
@endauth

</div>

</body>
</html>