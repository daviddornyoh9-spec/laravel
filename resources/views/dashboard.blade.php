<!DOCTYPE html>
<html>
<head>
    <title>Praktix Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .navbar {
            background: #1f2937;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 22px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .container {
            padding: 40px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .card h2 {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 32px;
            font-weight: bold;
        }

        .programs { border-left: 5px solid #3b82f6; }
        .applications { border-left: 5px solid #8b5cf6; }
        .accepted { border-left: 5px solid #10b981; }
        .rejected { border-left: 5px solid #ef4444; }

        .actions {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }

        .blue { background: #3b82f6; }
        .green { background: #10b981; }
        .purple { background: #8b5cf6; }
        .red { background: #ef4444; }
    </style>
</head>

<body>

<div class="navbar">
    <h1>Praktix Dashboard</h1>

    <div>
        <a href="{{ route('programs.index') }}">Programs</a>
        <a href="{{ route('admin.applications.index') }}">Applications</a>
        <a href="{{ route('profile.edit') }}">Profile</a>

        <!-- ROLE -->
        @if(auth()->user()->role === 'admin')
            <span style="margin-left:15px; color:gold;">ADMIN</span>
        @else
            <span style="margin-left:15px;">USER</span>
        @endif

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn red">Logout</button>
        </form>
    </div>
</div>

<div class="container">

    <div class="cards">

        <div class="card programs">
            <h2>Programs</h2>
            <p>{{ $programsCount }}</p>
        </div>

        <div class="card applications">
            <h2>Applications</h2>
            <p>{{ $applicationsCount }}</p>
        </div>

        <div class="card accepted">
            <h2>Accepted</h2>
            <p>{{ $acceptedCount }}</p>
        </div>

        <div class="card rejected">
            <h2>Rejected</h2>
            <p>{{ $rejectedCount }}</p>
        </div>

    </div>

    <div class="actions">
        <h2>Quick Actions</h2>

        <a href="{{ route('programs.index') }}" class="btn blue">Manage Programs</a>
        <a href="{{ route('programs.create') }}" class="btn green">Add Program</a>
        <a href="{{ route('admin.applications.index') }}" class="btn purple">View Applications</a>
    </div>

</div>

</body>
</html>