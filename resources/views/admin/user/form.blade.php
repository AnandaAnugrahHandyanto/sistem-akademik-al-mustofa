@extends('layouts.admin')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} User</h4>
<form method="POST" action="{{ $action }}" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>Name</label><input name="name" value="{{ old('name',$item->name) }}" class="form-control" required></div>
<div class="mb-2"><label>Username</label><input name="username" value="{{ old('username',$item->username) }}" class="form-control" required></div>
<div class="mb-2"><label>Email</label><input name="email" value="{{ old('email',$item->email) }}" class="form-control" required></div>
<div class="mb-2"><label>Password {{ $item->exists ? '(kosongkan jika tidak ganti)' : '' }}</label><input name="password" type="password" class="form-control" @if(!$item->exists) required @endif></div>
<div class="mb-2"><label>Role</label><select name="role" class="form-select" required><option value="admin" @selected(old('role',$item->role)=='admin')>admin</option><option value="guru" @selected(old('role',$item->role)=='guru')>guru</option><option value="ortu" @selected(old('role',$item->role)=='ortu')>ortu</option><option value="siswa" @selected(old('role',$item->role)=='siswa')>siswa</option></select></div>
<div class="row">
<div class="col"><label>Siswa</label><select name="siswa_id" class="form-select"><option value="">-</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }}</option>@endforeach</select></div>
<div class="col"><label>Guru</label><select name="guru_id" class="form-select"><option value="">-</option>@foreach($gurus as $g)<option value="{{ $g->id }}" @selected(old('guru_id',$item->guru_id)==$g->id)>{{ $g->nama_lengkap }}</option>@endforeach</select></div>
</div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('admin.user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
