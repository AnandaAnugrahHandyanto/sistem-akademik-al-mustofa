@extends('layouts.app')
@section('content')
<div class="max-w-5xl mx-auto p-6">
<div class="flex justify-between items-center mb-6"><h1 class="text-xl font-bold">Dashboard Orang Tua</h1>
<form method="POST" action="{{ route('logout') }}">@csrf<button class="text-sm text-red-600">Logout ({{ auth()->user()->username }} - {{ auth()->user()->role }})</button></form></div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<div class="bg-white rounded shadow p-4 text-center text-sm">Lihat Nilai</div><div class="bg-white rounded shadow p-4 text-center text-sm">Lihat Hafalan</div><div class="bg-white rounded shadow p-4 text-center text-sm">Lihat Karakter</div>
</div>
<p class="text-xs text-gray-400 mt-6">Role: {{ auth()->user()->role }} — SDIT Al-Mustofa</p>
</div>
@endsection
