<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Admin - Al-Mustofa')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
body{font-family:'Inter','Poppins',sans-serif;background:#f8f9fa;}
.sidebar{width:260px;height:100vh;background:#d97706;color:#ffffff;position:sticky;top:0;flex-shrink:0;display:flex;flex-direction:column;}
.sidebar .nav-link{color:#ffffff;opacity:.85;font-weight:500;font-size:.92rem;}
.sidebar .nav-link:hover{background:rgba(255,255,255,.18);color:#ffffff;opacity:1;}
.sidebar .nav-link i{font-size:1rem;line-height:1;vertical-align:middle;flex-shrink:0;}
.sidebar .nav-link.active{background:rgba(255,255,255,.28);color:#ffffff;font-weight:600;}
.sidebar .logo{border-bottom:1px solid rgba(255,255,255,.22);padding-bottom:1rem;flex-shrink:0;}
.sidebar-menu{flex:1 1 auto;overflow-y:auto;min-height:0;}
.sidebar-footer{flex-shrink:0;margin-top:auto;border-top:1px solid rgba(255,255,255,.22);padding-top:1rem;}
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
<div class="fw-bold" style="font-family:'Poppins',sans-serif;font-size:1.25rem;letter-spacing:.02em;"><i class="bi bi-mortarboard me-1"></i> Al-Mustofa</div>
<small style="opacity:.8;">Admin</small>
</div>
<nav class="nav flex-column gap-1 sidebar-menu" id="sidebar-menu">
<a href="{{ route('admin.siswa.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-people"></i> Siswa</a>
<a href="{{ route('admin.guru.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-person-badge"></i> Guru</a>
<a href="{{ route('admin.kelas.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-building"></i> Kelas</a>
<a href="{{ route('admin.mapel.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-book"></i> Mata Pelajaran</a>
<a href="{{ route('admin.user.index') }}" class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded {{ request()->routeIs('admin.user.*') ? 'active' : '' }}" onclick="closeSidebarIfMobile()"><i class="bi bi-person-gear"></i> User</a>
</nav>
<div class="sidebar-footer">
<div class="d-flex align-items-center gap-2 mb-2">
<div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width:36px;height:36px;"><i class="bi bi-person-fill"></i></div>
<div><div class="small fw-semibold">{{ auth()->user()->username }}</div><div style="font-size:.72rem;opacity:.8;">{{ auth()->user()->role }}</div></div>
</div>
<form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-light btn-sm w-100 text-danger fw-semibold"><i class="bi bi-box-arrow-right me-1"></i> Logout</button></form>
</div>
</aside>
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>
<main class="flex-grow-1 main">
<nav class="d-md-none bg-white border-bottom p-2 d-flex align-items-center"><button class="btn btn-outline-secondary btn-sm" onclick="openSidebar()"><i class="bi bi-list"></i></button><span class="ms-2 fw-semibold">Admin</span></nav>
<div class="p-4" style="max-width:1100px;">
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
