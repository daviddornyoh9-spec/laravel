<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Apply</title>

<style>
    body{
        font-family: Arial;
        background: linear-gradient(135deg,#0f172a,#1e293b);
        margin:0;
        padding:40px;
        color:white;
    }

    .card{
        max-width:500px;
        margin:auto;
        background:white;
        color:#111;
        padding:30px;
        border-radius:15px;
        box-shadow:0 15px 40px rgba(0,0,0,0.3);
    }

    h2{
        margin-bottom:20px;
    }

    input{
        width:100%;
        padding:12px;
        margin-top:10px;
        border:1px solid #e2e8f0;
        border-radius:8px;
    }

    button{
        width:100%;
        padding:12px;
        margin-top:15px;
        background:#0ea5e9;
        border:none;
        color:white;
        font-weight:bold;
        border-radius:8px;
        cursor:pointer;
    }

    button:hover{
        background:#0284c7;
    }

    .success{
        background:#22c55e;
        color:white;
        padding:10px;
        border-radius:8px;
        margin-bottom:15px;
    }

    .title{
        font-size:18px;
        margin-bottom:10px;
        color:#334155;
    }
</style>

</head>
<body>

<div class="card">

    <h2>📩 Apply Now</h2>

    <div class="title">
        Program: <b>{{ $program->title }}</b>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('apply.store', $program->id) }}"
          enctype="multipart/form-data">

        @csrf

        <input type="text" name="full_name" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="text" name="phone" placeholder="Phone" required>

        <input type="file" name="cv" required>

        <button type="submit">Submit Application</button>

    </form>

</div>

</body>
</html>