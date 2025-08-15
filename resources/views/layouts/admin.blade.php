<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin-custom.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .sidebar {
            min-height: 100vh;
            background: #212529;
            color: #fff;
            width: 220px;
            position: fixed;
            top: 0; left: 0;
            z-index: 1030;
            display: flex;
            flex-direction: column;
        }
        .sidebar .nav-link { color: #adb5bd; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #fff; background: #343a40; }
        .sidebar .navbar-brand { color: #fff; font-weight: 600; font-size: 1.3rem; }
        .sidebar .logout-btn { margin-top: auto; }
        main.container { margin-left: 240px; padding-top: 2rem; }
        .form-check-input { cursor: pointer; }
    </style>
</head>
<body>
<div class="sidebar d-flex flex-column p-3">
    <a class="navbar-brand mb-4" href="{{ route('admin.dashboard') }}">Admin Panel</a>
    <ul class="nav nav-pills flex-column mb-auto gap-1">
        <li><a class="nav-link{{ request()->routeIs('admin.games.*') ? ' active' : '' }}" href="{{ route('admin.games.index') }}"> <i class="bi bi-controller"></i> Games</a></li>
        <li><a class="nav-link{{ request()->routeIs('admin.categories.*') ? ' active' : '' }}" href="{{ route('admin.categories.index') }}"> <i class="bi bi-tags"></i> Categories</a></li>
        <li><a class="nav-link{{ request()->routeIs('admin.settings.*') ? ' active' : '' }}" href="{{ route('admin.settings.edit') }}"> <i class="bi bi-gear"></i> Ads Settings</a></li>
    </ul>
    <form class="logout-btn mt-4" method="post" action="{{ route('admin.logout') }}">
        @csrf
        <button class="btn btn-outline-light w-100" type="submit">Logout</button>
    </form>
</div>
<main class="container">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>



