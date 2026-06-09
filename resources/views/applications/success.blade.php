<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Success</title>

    <style>
        body{
            font-family: Arial;
            background:#f5f6fa;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:12px;
            text-align:center;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
            max-width:400px;
        }

        h1{
            color:#28a745;
            margin-bottom:10px;
        }

        p{
            color:#555;
            margin-bottom:20px;
        }

        a{
            display:inline-block;
            padding:12px 18px;
            background:#2d6cdf;
            color:white;
            text-decoration:none;
            border-radius:6px;
        }

        a:hover{
            background:#1b4fb8;
        }
    </style>
</head>

<body>

<div class="card">
    <h1>🎉 Thank You!</h1>

    <p>Your application has been submitted successfully.</p>

    <a href="{{ route('programs.index') }}">
        Back to Programs
    </a>
</div>

</body>
</html>
