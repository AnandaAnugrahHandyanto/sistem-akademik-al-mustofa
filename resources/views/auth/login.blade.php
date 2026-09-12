@extends('layouts.app')
@section('content')
<div class="min-h-screen d-flex align-items-center justify-content-center p-3 p-md-4" style="background:linear-gradient(135deg,#fef3c7 0%,#fde68a 50%,#fdba74 100%);">
<div class="w-100 bg-white rounded-3 shadow" style="max-width:400px;box-shadow:0 8px 30px rgba(0,0,0,.08);padding:2rem;">
<div class="text-center mb-4">
<div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-3" style="width:60px;height:60px;background:#f59e0b;color:#fff;font-size:28px;"><i class="bi bi-mortarboard-fill" style="line-height:1;"></i></div>
<h1 class="h5 fw-bold mb-1" style="font-family:'Poppins',sans-serif;">Yayasan Islam Al-Mustofa</h1>
<p class="small text-muted mb-0">Sistem Akademik</p>
</div>
@if($errors->any())<div class="alert alert-danger small py-2 mb-3">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.post') }}">@csrf
<div class="mb-3">
<label for="username" class="form-label fw-medium mb-1" style="font-size:.9rem;">Username</label>
<input id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" class="form-control" style="border-radius:8px;height:42px;" required>
</div>
<div class="mb-3">
<label for="password" class="form-label fw-medium mb-1" style="font-size:.9rem;">Password</label>
<input id="password" name="password" type="password" placeholder="Masukkan password" class="form-control" style="border-radius:8px;height:42px;" required>
</div>
<button type="submit" class="btn w-100 fw-bold text-white mt-1" style="background:#f59e0b;border-color:#f59e0b;height:44px;border-radius:8px;">Login</button>
<style>.btn:hover{background:#d97706 !important;border-color:#d97706 !important;} .form-control:focus{border-color:#f59e0b;box-shadow:0 0 0 .2rem rgba(245,158,11,.2);} .form-control::placeholder{color:#9ca3af;font-weight:400;}</style>
</form>
<p class="text-center mb-0" style="font-size:.85rem;color:#6c757d;margin-top:12px;">admin/admin123 • guru/guru123 • ortu/ortu123 • siswa/siswa123</p>
</div>
</div>
@endsection
