@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center p-4" style="background:linear-gradient(135deg,#fef3c7 0%,#fde68a 50%,#fdba74 100%);">
<div class="w-full max-w-sm bg-white rounded-xl shadow p-6" style="box-shadow:0 8px 30px rgba(0,0,0,.08);">
<div class="text-center mb-4">
<div class="mx-auto mb-2 d-flex align-items-center justify-content-center rounded-circle" style="width:56px;height:56px;background:#f59e0b;color:white;font-size:24px;">🎓</div>
<h1 class="text-xl fw-bold" style="font-family:'Poppins',sans-serif;">Yayasan Islam Al-Mustofa</h1>
<p class="text-center small text-muted">Sistem Akademik</p>
</div>
@if($errors->any())<div class="bg-red-50 text-danger small p-2 rounded mb-3 border border-danger border-opacity-25">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.post') }}">@csrf
<div class="mb-3"><label class="form-label small fw-medium">Username</label><input name="username" value="{{ old('username') }}" placeholder="username" class="form-control" required></div>
<div class="mb-3"><label class="form-label small fw-medium">Password</label><input name="password" type="password" placeholder="••••••••" class="form-control" required></div>
<button class="w-full btn btn-warning text-white fw-semibold" style="background:#f59e0b;border-color:#f59e0b;">Login</button>
</form>
<p class="text-center mt-3" style="font-size:.72rem;color:#9ca3af;">admin/admin123 • guru/guru123 • ortu/ortu123 • siswa/siswa123</p>
</div></div>
@endsection
