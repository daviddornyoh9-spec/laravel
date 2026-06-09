<!DOCTYPE html>
<html>
<head>
    <title>Praktix Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body{
            background:#f6f7fb;
            color:#1f2937;
        }

        /* NAVBAR */
        .navbar{
            background:#111827;
            color:white;
            padding:18px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .navbar h2{
            font-size:18px;
            font-weight:600;
        }

        .nav-links a, .nav-links button{
            color:#e5e7eb;
            text-decoration:none;
            margin-left:16px;
            font-size:14px;
            background:none;
            border:none;
            cursor:pointer;
        }

        .nav-links a:hover,
        .nav-links button:hover{
            color:#60a5fa;
        }

        .badge{
            padding:4px 10px;
            border-radius:999px;
            font-size:12px;
            margin-left:10px;
            font-weight:600;
        }

        .admin{ background:#ef4444; color:white; }
        .user{ background:#3b82f6; color:white; }

        /* CONTAINER */
        .container{
            padding:30px;
            max-width:1100px;
            margin:auto;
        }

        /* CARDS */
        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:18px;
            margin-bottom:30px;
        }

        .card{
            background:white;
            padding:22px;
            border-radius:14px;
            box-shadow:0 6px 18px rgba(0,0,0,0.06);
        }

        .card h3{
            font-size:14px;
            color:#6b7280;
        }

        .card p{
            font-size:28px;
            font-weight:700;
            margin-top:8px;
        }

        .blue{ border-left:5px solid #3b82f6; }
        .green{ border-left:5px solid #10b981; }
        .purple{ border-left:5px solid #8b5cf6; }
        .red{ border-left:5px solid #ef4444; }

        /* ACTIONS */
        .actions{
            background:white;
            padding:22px;
            border-radius:14px;
            box-shadow:0 6px 18px rgba(0,0,0,0.06);
        }

        .btn{
            display:inline-block;
            padding:10px 14px;
            border-radius:10px;
            text-decoration:none;
            color:white;
            font-size:14px;
            margin-right:10px;
        }

        .btn-blue{ background:#3b82f6; }
        .btn-green{ background:#10b981; }
        .btn-purple{ background:#8b5cf6; }

        /* MODAL */
        .modal{
            display:none;
            position:fixed;
            inset:0;
            background:rgba(0,0,0,0.5);
            align-items:center;
            justify-content:center;
        }

        .modal-box{
            background:white;
            padding:25px;
            border-radius:12px;
            width:320px;
            text-align:center;
        }

        .modal-box h3{
            margin-bottom:10px;
        }

        .modal-actions{
            margin-top:15px;
            display:flex;
            justify-content:center;
            gap:10px;
        }

        .btn-cancel{
            background:#e5e7eb;
            padding:8px 12px;
            border:none;
            border-radius:8px;
            cursor:pointer;
        }

        .btn-danger{
            background:#ef4444;
            color:white;
            padding:8px 12px;
            border:none;
            border-radius:8px;
            cursor:pointer;
        }
    </style>
</head>

<body>

<div class="navbar">

    <div>
        <h2>Praktix Dashboard</h2>

        @if(auth()->user()->role === 'admin')
            <span class="badge admin">ADMIN</span>
        @else
            <span class="badge user">USER</span>
        @endif
    </div>

    <div class="nav-links">
        <a href="{{ route('programs.index') }}">Programs</a>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.applications.index') }}">Applications</a>
        @endif

        <a href="{{ route('profile.edit') }}">Profile</a>

        <!-- LOGOUT -->
        <button onclick="openModal()">Logout</button>
    </div>
</div>

<div class="container">

    @if(auth()->user()->role === 'admin')

        <div class="cards">
            <div class="card blue">
                <h3>Total Programs</h3>
                <p>{{ $programsCount }}</p>
            </div>

            <div class="card purple">
                <h3>Applications</h3>
                <p>{{ $applicationsCount }}</p>
            </div>

            <div class="card green">
                <h3>Accepted</h3>
                <p>{{ $acceptedCount }}</p>
            </div>

            <div class="card red">
                <h3>Rejected</h3>
                <p>{{ $rejectedCount }}</p>
            </div>
        </div>

        <div class="actions">
            <h3>Admin Panel</h3>
            <a href="{{ route('programs.index') }}" class="btn btn-blue">View Programs</a>
            <a href="{{ route('programs.create') }}" class="btn btn-green">Add Program</a>
            <a href="{{ route('admin.applications.index') }}" class="btn btn-purple">Applications</a>
        </div>

    @else

        <div class="actions">
            <h3>Welcome {{ auth()->user()->name }}</h3>
            <a href="{{ route('programs.index') }}" class="btn btn-blue">Browse Programs</a>
        </div>

    @endif

</div>

<!-- MODAL -->
<div class="modal" id="logoutModal">
    <div class="modal-box">
        <h3>Confirm Logout</h3>
        <p>Are you sure you want to logout?</p>

        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeModal()">Cancel</button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-danger" type="submit">Yes, Logout</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(){
        document.getElementById('logoutModal').style.display = 'flex';
    }

    function closeModal(){
        document.getElementById('logoutModal').style.display = 'none';
    }
</script>

</body>
</html>