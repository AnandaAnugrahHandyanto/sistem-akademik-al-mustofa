<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Orang Tua - Al-Mustofa')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
<div class="container">
<a class="navbar-brand" href="{{ route('dashboard') }}">Al-Mustofa Orang Tua</a>
<div class="navbar-nav">
<a class="nav-link" href="{{ route('ortu.nilai.index') }}">Nilai Anak</a>
</div>
<div class="ms-auto d-flex align-items-center gap-2">
<span class="text-white small">{{ auth()->user()->username }} ({{ auth()->user()->role }})</span>
<form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-sm btn-light">Logout</button></form>
</div>
</div>
</nav>
<div class="container py-4">
@if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif
@yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
