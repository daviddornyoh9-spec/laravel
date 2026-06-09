<!DOCTYPE html>
<html>
<head>
    <title>Applications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', Arial, sans-serif;
        }

        body{
            background: linear-gradient(135deg,#eef2ff,#f8fafc);
            padding:30px;
        }

        .container{
            max-width:1100px;
            margin:auto;
        }

        /* HEADER */
        .header{
            background: linear-gradient(90deg,#3b82f6,#8b5cf6);
            color:white;
            padding:20px;
            border-radius:16px;
            margin-bottom:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
            position:relative;
        }

        /* 🔙 FLÈCHE DANS HEADER (PLUS HAUT QUE CONTENU) */
        .back-btn{
            position:absolute;
            top:-18px;
            left:20px;
            background:white;
            color:#111827;
            padding:8px 12px;
            border-radius:12px;
            text-decoration:none;
            font-weight:600;
            box-shadow:0 8px 18px rgba(0,0,0,0.15);
            transition:0.2s;
            display:flex;
            align-items:center;
            gap:6px;
        }

        .back-btn:hover{
            transform:translateX(-4px);
            background:#f3f4f6;
        }

        .success{
            background:#10b981;
            color:white;
            padding:12px;
            border-radius:12px;
            margin-bottom:20px;
        }

        .card{
            background:white;
            border-radius:16px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
            overflow:hidden;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#111827;
            color:white;
            padding:14px;
            text-align:left;
        }

        td{
            padding:14px;
            border-bottom:1px solid #eee;
        }

        tr:hover{
            background:#f9fafb;
        }

        .badge{
            padding:6px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
        }

        .New{ background:#f59e0b; color:white; }
        .UnderReview{ background:#3b82f6; color:white; }
        .Accepted{ background:#10b981; color:white; }
        .Rejected{ background:#ef4444; color:white; }

        form{
            display:flex;
            gap:8px;
            align-items:center;
        }

        select{
            padding:8px;
            border-radius:10px;
        }

        button{
            padding:8px 14px;
            background:linear-gradient(90deg,#3b82f6,#8b5cf6);
            color:white;
            border:none;
            border-radius:10px;
            cursor:pointer;
        }

        button:hover{
            transform:scale(1.05);
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <!-- 🔙 FLÈCHE AU-DESSUS DU CONTENU -->
        <a href="{{ route('dashboard') }}" class="back-btn">
            ← Back
        </a>

        <h2>Applications</h2>
        <p style="opacity:0.9;">Manage all applications efficiently</p>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td><strong>{{ $application->full_name }}</strong></td>
                        <td>{{ $application->program->title ?? 'N/A' }}</td>

                        <td>
                            <span class="badge {{ str_replace(' ', '', $application->status) }}">
                                {{ $application->status }}
                            </span>
                        </td>

                        <td>
                            <form method="POST" action="{{ route('admin.applications.update', $application->id) }}">
                                @csrf
                                @method('PATCH')

                                <select name="status">
                                    <option value="New">New</option>
                                    <option value="Under Review">Under Review</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>

                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

</body>
</html>