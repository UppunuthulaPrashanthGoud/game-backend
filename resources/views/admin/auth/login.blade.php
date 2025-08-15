<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin-custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body{display:flex;align-items:center;justify-content:center;height:100vh;background:#f8fafc;font-family:'Inter',sans-serif;}
        .login-card{max-width:420px;width:100%;border-radius:16px;box-shadow:0 2px 16px rgba(44,62,80,0.10);}
        .login-logo{font-size:2.5rem;color:#4f8cff;display:flex;align-items:center;gap:0.5rem;justify-content:center;}
    </style>
</head>
<body>
<div class="login-card card shadow-sm p-4">
    <div class="login-logo mb-2"><i class="bi bi-person-circle"></i> <span class="fw-bold">Admin Login</span></div>
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    <form method="post" action="{{ route('admin.login.post') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Username</label>
            <input class="form-control" name="username" required autofocus>
        </div>
        <div class="col-12">
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" required>
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


