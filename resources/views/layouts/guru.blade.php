<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Guru - SDIT Al-Mustofa')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
body{font-family:'Inter','Poppins',sans-serif;background:#f8f9fa;}
.sidebar{width:260px;height:100vh;background:#16a34a;color:#ffffff;position:sticky;top:0;flex-shrink:0;display:flex;flex-direction:column;}
.sidebar .nav-link{color:#ffffff;opacity:.85;font-weight:500;font-size:.92rem;}
.sidebar .nav-link:hover{background:rgba(255,255,255,.18);color:#ffffff;opacity:1;}
.sidebar .nav-link i{font-size:1rem;line-height:1;vertical-align:middle;flex-shrink:0;}
.sidebar .nav-link.active{background:rgba(255,255,255,.28);color:#ffffff;font-weight:600;}
.sidebar .logo{border-bottom:1px solid rgba(255,255,255,.22);padding-bottom:1rem;flex-shrink:0;}
.sidebar-menu{flex:1 1 auto;overflow-y:auto;min-height:0;}
.card{border:none;box-shadow:0 2px 12px rgba(0,0,0,.06);border-radius:12px;}
.table thead th{font-weight:600;font-size:.82rem;text-transform:uppercase;letter-spacing:.04em;background:#f8f9fa;}
.table-hover tbody tr:hover{background:#f1f5f9;}
.btn{border-radius:8px;}
.sidebar-close{display:none;}
.overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:1044;}
.overlay.show{display:block;}
@media(max-width:768px){
.sidebar{position:fixed;left:0;top:0;z-index:1045;transform:translateX(-100%);transition:.3s;height:100dvh;}
.sidebar.show{transform:translateX(0);}
.main{width:100%;}
.sidebar-close{display:block;position:absolute;top:10px;right:12px;background:rgba(255,255,255,.22);border:none;color:#fff;width:32px;height:32px;border-radius:50%;}
}
</style>
</head>
<body>
<div class="d-flex">
<aside class="sidebar p-3 shadow-sm" id="sidebar">
<button class="sidebar-close" onclick="closeSidebar()" aria-label="Close"><i class="bi bi-x-lg"></i></button>
<div class="logo text-center mb-3">
<div class="fw-bold" style="font-family:'Poppins',sans-serif;font-size:1.25rem;letter-spacing:.02em;"><i class="bi bi-mortarboard me-1"></i> SDIT Al-Mustofa</div>
<small style="opacity:.8;">Guru</small>
</div>
<nav class="nav flex-column gap-1 sidebar-menu" id="sidebar-menu">
<a href="{{ route('guru.nilai.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('guru.nilai.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-clipboard-data"></i> Nilai</a>
<a href="{{ route('guru.hafalan.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('guru.hafalan.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-book-half"></i> Hafalan</a>
<a href="{{ route('guru.karakter.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('guru.karakter.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-heart"></i> Karakter</a>
</nav>
</aside>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>
<main class="flex-grow-1 main">
<nav class="bg-white border-bottom p-2 d-flex align-items-center justify-content-between" style="position:sticky;top:0;z-index:1020;">
<div class="d-flex align-items-center"><button class="btn btn-outline-secondary btn-sm me-2 d-md-none" onclick="openSidebar()"><i class="bi bi-list"></i></button><span class="fw-semibold">Guru</span></div>
<div class="dropdown">
    <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle fs-5"></i>
        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><h6 class="dropdown-header">{{ Auth::user()->name }}<br><small class="text-muted">{{ Auth::user()->role }}</small></h6></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('settings') }}"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
</nav>
<div class="p-4" style="max-width:1100px;">
@include('partials.breadcrumbs')
@if(session('ok'))<div class="alert alert-success d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session('ok') }}</div>@endif
@yield('content')
</div>
</main>
</div>
<script>
function openSidebar(){document.getElementById('sidebar').classList.add('show');document.getElementById('overlay').classList.add('show');}
function closeSidebar(){document.getElementById('sidebar').classList.remove('show');document.getElementById('overlay').classList.remove('show');}
function closeSidebarIfMobile(){if(window.innerWidth<768) closeSidebar();}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>