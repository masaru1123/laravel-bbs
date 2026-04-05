<!DOCTYPE html>
<html>
<head>
    <title>編集</title>

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
    </style>

</head>
<body>

<div class="container">

<h2>編集</h2>

<form method="POST" action="/update/{{ $comment->id }}">
    @csrf
    <textarea name="content">{{ $comment->content }}</textarea>
    <button type="submit">更新</button>
</form>

</div>

</body>
</html>