<!DOCTYPE html>
<html>
<head>
    <title>掲示板トップ</title>

    <style>
        body {
            background: #f5f5f5;
            text-align: center;
            margin-top: 120px;
            font-family: sans-serif;
        }

        h1 {
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .btn {
            width: 200px;
            padding: 12px;
            background: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn.secondary {
            background: #777;
        }
    </style>
</head>
<body>

    <h1>掲示板アプリ</h1>

    <div class="container">

        @auth
            <a href="/list" class="btn">掲示板を見る</a>
        @else
            <a href="/login" class="btn">ログイン</a>
            <a href="/register" class="btn secondary">新規登録</a>
        @endauth

    </div>

</body>
</html>