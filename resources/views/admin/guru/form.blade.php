@extends('layouts.admin')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Guru</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">NIP <span class="text-danger">*</span></label><input name="nip" value="{{ old('nip',$item->nip) }}" class="form-control" placeholder="19800101" required></div>
<div class="mb-3"><label class="form-label fw-medium">Nama Lengkap <span class="text-danger">*</span></label><input name="nama_lengkap" value="{{ old('nama_lengkap',$item->nama_lengkap) }}" class="form-control" placeholder="Nama lengkap guru" required></div>
<div class="mb-3"><label class="form-label fw-medium">Email</label><input name="email" type="email" value="{{ old('email',$item->email) }}" class="form-control" placeholder="guru@almustofa.sch.id"></div>
<div class="mb-3"><label class="form-label fw-medium">No HP</label><input name="no_hp" value="{{ old('no_hp',$item->no_hp) }}" class="form-control" placeholder="08xxxxxxxxxx"></div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-warning text-white"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('admin.guru.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
