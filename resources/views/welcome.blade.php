<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Yayasan Islam Al-Mustofa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
*{font-family:'Inter',sans-serif}
h1,h2,h3,h4{font-family:'Poppins',sans-serif}
body{display:grid;grid-template-rows:auto 1fr auto;min-height:100dvh}
@keyframes fadeInUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
.fade-in{animation:fadeInUp .6s ease both}
.fade-in-2{animation:fadeInUp .6s .15s ease both}
.fade-in-3{animation:fadeInUp .6s .3s ease both}
.hero{position:relative;background-color:#fef3c7;background-image:url('{{ asset('images/bg-yayasan.jpg') }}'),linear-gradient(135deg,#fef3c7 0%,#fde68a 50%,#fdba74 100%);background-size:cover,cover;background-position:center,center;background-attachment:fixed,fixed}
.hero::before{content:'';position:absolute;inset:0;background:rgba(0,0,0,0.52)}
.hero> *{position:relative;z-index:1}
.card-feature{transition:transform .2s,box-shadow .2s;border:none;border-radius:16px}
.card-feature:hover{transform:translateY(-4px);box-shadow:0 12px 28px rgba(0,0,0,.12) !important}
.btn-primary-custom{background:#f59e0b;border-color:#f59e0b;color:#fff;font-weight:700;border-radius:10px;height:44px;line-height:44px;padding:0 28px}
.btn-primary-custom:hover{background:#d97706 !important;border-color:#d97706 !important;color:#fff}
.btn-outline-custom{border:2px solid #fff;color:#fff;font-weight:600;border-radius:10px;height:44px;line-height:42px;padding:0 28px;background:rgba(255,255,255,.08);backdrop-filter:blur(4px)}
.btn-outline-custom:hover{background:#fff;color:#92400e}
.icon-box{width:56px;height:56px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:26px;color:#fff}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top" style="z-index:10;">
<div class="container">
<a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="#" style="font-family:'Poppins',sans-serif;color:#92400e;">
<span class="d-flex align-items-center justify-content-center rounded-3" style="width:36px;height:36px;background:#f59e0b;color:#fff;font-size:18px;"><i class="bi bi-mortarboard-fill"></i></span>
Al-Mustofa
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navMain">
<ul class="navbar-nav mx-auto gap-lg-2">
<li class="nav-item"><a class="nav-link fw-medium" href="#beranda">Beranda</a></li>
<li class="nav-item"><a class="nav-link fw-medium" href="#tentang">Tentang</a></li>
<li class="nav-item"><a class="nav-link fw-medium" href="#fitur">Fitur</a></li>
</ul>
<a href="{{ route('login') }}" class="btn btn-primary-custom d-inline-flex align-items-center justify-content-center mt-2 mt-lg-0">Login <i class="bi bi-box-arrow-in-right ms-2"></i></a>
</div>
</div>
</nav>

<main>
<section id="beranda" class="hero d-flex align-items-center text-white text-center py-5" style="min-height:52vh;">
<div class="container py-4">
<p class="small fw-semibold mb-2 fade-in" style="letter-spacing:.08em;color:#fde68a;">Yayasan Islam Al-Mustofa</p>
<h1 class="display-6 fw-bold mb-3 fade-in-2" style="line-height:1.25;">Sistem Akademik, Monitoring Hafalan,<br class="d-none d-md-block"> dan Penilaian Karakter</h1>
<p class="mx-auto mb-4 fade-in-2" style="max-width:620px;color:#fef3c7;font-size:1.02rem;">Sistem informasi berbasis web untuk mengelola data akademik, monitoring hafalan, dan penilaian karakter siswa.</p>
<div class="d-flex flex-wrap gap-3 justify-content-center fade-in-3">
<a href="{{ route('login') }}" class="btn btn-primary-custom">Login</a>
<a href="#fitur" class="btn btn-outline-custom">Pelajari Lebih Lanjut</a>
</div>
</div>
</section>

<section id="fitur" class="py-5 bg-white">
<div class="container">
<div class="text-center mb-4 fade-in">
<h2 class="h4 fw-bold" style="color:#1f2937;">Fitur Unggulan</h2>
<p class="text-muted small">Tiga pilar utama sistem kami</p>
</div>
<div class="row g-4">
<div class="col-12 col-md-4 fade-in">
<div class="card card-feature h-100 shadow-sm p-4 text-center">
<div class="icon-box mx-auto mb-3" style="background:#2563eb;"><i class="bi bi-clipboard-data"></i></div>
<h3 class="h6 fw-bold mb-2" style="color:#1f2937;">Sistem Akademik</h3>
<p class="small text-muted mb-0">Kelola nilai siswa dengan mudah</p>
</div>
</div>
<div class="col-12 col-md-4 fade-in-2">
<div class="card card-feature h-100 shadow-sm p-4 text-center">
<div class="icon-box mx-auto mb-3" style="background:#16a34a;"><i class="bi bi-book-half"></i></div>
<h3 class="h6 fw-bold mb-2" style="color:#1f2937;">Monitoring Hafalan</h3>
<p class="small text-muted mb-0">Pantau progress hafalan real-time</p>
</div>
</div>
<div class="col-12 col-md-4 fade-in-3">
<div class="card card-feature h-100 shadow-sm p-4 text-center">
<div class="icon-box mx-auto mb-3" style="background:#ec4899;"><i class="bi bi-heart"></i></div>
<h3 class="h6 fw-bold mb-2" style="color:#1f2937;">Penilaian Karakter</h3>
<p class="small text-muted mb-0">Nilai 6 aspek karakter siswa</p>
</div>
</div>
</div>
</div>
</section>

<section id="tentang" class="py-4 bg-light border-top">
<div class="container">
<div class="row align-items-center g-4">
<div class="col-12 col-md-6">
<h2 class="h5 fw-bold mb-2" style="color:#1f2937;">Tentang Yayasan</h2>
<p class="small text-muted mb-0">Yayasan Islam Al-Mustofa berkomitmen memberikan pendidikan Islam terpadu yang mengintegrasikan akademik, tahfidz, dan pembentukan karakter untuk mencetak generasi berakhlak mulia.</p>
</div>
<div class="col-12 col-md-6 text-md-end">
<span class="badge rounded-pill px-3 py-2" style="background:#fef3c7;color:#92400e;border:1px solid #fde68a;"><i class="bi bi-mortarboard me-1"></i> SD Islam Al-Mustofa</span>
</div>
</div>
</div>
</section>
</main>

<footer class="text-white pt-4 pb-3" style="background:#422006;">
<div class="container">
<div class="row g-4">
<div class="col-12 col-md-4">
<h6 class="fw-bold mb-2" style="font-family:'Poppins',sans-serif;">Tentang Yayasan</h6>
<p class="small mb-0" style="color:#fde68a;">Yayasan Islam Al-Mustofa — pendidikan Islam terpadu akademik, tahfidz, dan karakter.</p>
</div>
<div class="col-12 col-md-4">
<h6 class="fw-bold mb-2">Kontak</h6>
<ul class="list-unstyled small mb-0" style="color:#fde68a;">
<li class="mb-1"><i class="bi bi-geo-alt me-2"></i>Jl. Pendidikan No. 123, Kota</li>
<li class="mb-1"><i class="bi bi-telephone me-2"></i>(021) 1234-5678</li>
<li><i class="bi bi-envelope me-2"></i>info@al-mustofa.sch.id</li>
</ul>
</div>
<div class="col-12 col-md-4">
<h6 class="fw-bold mb-2">Sosial Media</h6>
<div class="d-flex gap-3 fs-5">
<a href="#" class="text-white" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
<a href="#" class="text-white" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
<a href="#" class="text-white" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
</div>
</div>
</div>
<hr class="my-3" style="border-color:rgba(255,255,255,.2)">
<p class="text-center small mb-0" style="color:#fde68a;">© 2026 Yayasan Islam Al-Mustofa. All rights reserved.</p>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
