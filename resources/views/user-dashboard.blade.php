<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <style>
        body{
            font-family: Arial;
            background:#f4f6f9;
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:10px;
            margin-bottom:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.08);
        }

        .status{
            padding:5px 10px;
            border-radius:5px;
            color:white;
            display:inline-block;
        }

        .Accepted{ background:green; }
        .Rejected{ background:red; }
        .New{ background:orange; }
    </style>
</head>
<body>

<h1>My Applications</h1>

<div class="container">

    @forelse($applications as $app)

        <div class="card">
            <h3>{{ $app->program->title ?? 'Program deleted' }}</h3>

            <p>Status:
                <span class="status {{ $app->status }}">
                    {{ $app->status }}
                </span>
            </p>

            <p>Name: {{ $app->full_name }}</p>
            <p>Email: {{ $app->email }}</p>
        </div>

    @empty
        <p>You have no applications yet.</p>
    @endforelse

</div>

</body>
</html>