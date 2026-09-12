@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
<div class="w-full max-w-sm bg-white rounded-xl shadow p-6">
<h1 class="text-xl font-bold text-center">Yayasan Islam Al-Mustofa</h1>
<p class="text-center text-sm text-gray-500 mb-4">Sistem Akademik</p>
@if($errors->any())<div class="bg-red-50 text-red-700 text-sm p-2 rounded mb-3">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.post') }}">@csrf
<input name="username" value="{{ old('username') }}" placeholder="Username" class="w-full border rounded px-3 py-2 mb-3" required>
<input name="password" type="password" placeholder="Password" class="w-full border rounded px-3 py-2 mb-3" required>
<button class="w-full bg-blue-600 text-white rounded py-2">Login</button>
</form>
<p class="text-xs text-gray-400 text-center mt-3">admin/admin123 • guru/guru123 • ortu/ortu123 • siswa/siswa123</p>
</div></div>
@endsection
