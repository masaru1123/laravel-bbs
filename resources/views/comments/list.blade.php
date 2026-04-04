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

        .comment {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
    </style>


</head>
<body>

<div class="container">

<h1>掲示板</h1>

<!-- 投稿フォーム -->
<form method="POST" action="/submit">
    @csrf
    <textarea name="content"></textarea>
    <button type="submit">送信</button>
</form>

<hr>

<!-- 一覧表示 -->
@foreach ($comments as $comment)
    <p>{{ $comment->content }}</p>
@endforeach

</body>
</html>