@extends('layouts.admin')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} User</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Name <span class="text-danger">*</span></label><input name="name" value="{{ old('name',$item->name) }}" class="form-control" placeholder="Nama lengkap" required></div>
<div class="mb-3"><label class="form-label fw-medium">Username <span class="text-danger">*</span></label><input name="username" value="{{ old('username',$item->username) }}" class="form-control" placeholder="username" required></div>
<div class="mb-3"><label class="form-label fw-medium">Email <span class="text-danger">*</span></label><input name="email" type="email" value="{{ old('email',$item->email) }}" class="form-control" placeholder="email@almustofa.sch.id" required></div>
<div class="mb-3"><label class="form-label fw-medium">Password {{ $item->exists ? '(kosongkan jika tidak ganti)' : '*' }}</label><input name="password" type="password" class="form-control" placeholder="Minimal 6 karakter" @if(!$item->exists) required @endif></div>
<div class="mb-3"><label class="form-label fw-medium">Role <span class="text-danger">*</span></label><select name="role" class="form-select" required><option value="admin" @selected(old('role',$item->role)=='admin')>admin</option><option value="guru" @selected(old('role',$item->role)=='guru')>guru</option><option value="ortu" @selected(old('role',$item->role)=='ortu')>ortu</option><option value="siswa" @selected(old('role',$item->role)=='siswa')>siswa</option></select></div>
<div class="row g-3">
<div class="col-md-6"><label class="form-label fw-medium">Siswa (untuk role ortu/siswa)</label><select name="siswa_id" class="form-select"><option value="">-</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label fw-medium">Guru (untuk role guru)</label><select name="guru_id" class="form-select"><option value="">-</option>@foreach($gurus as $g)<option value="{{ $g->id }}" @selected(old('guru_id',$item->guru_id)==$g->id)>{{ $g->nama_lengkap }}</option>@endforeach</select></div>
</div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-warning text-white"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
