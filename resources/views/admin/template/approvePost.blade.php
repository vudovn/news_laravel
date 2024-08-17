<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        .header, .footer {
            background: #f4f4f4;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>THÔNG BÁO</h1>
        </div>
        <div class="content">
            <p>Dear {{ $author }}.</p>
            <p>Bài viết có tiêu đề <strong>{{ $name }}</strong> - {{ $content }}</p>
            @if ($note != null)
                <p>Lời nhắn: {{ $note }}</p>
            @endif
        </div>
        <div class="footer">
            <p>&copy; 2024.</p>
        </div>
    </div>
</body>
</html>
