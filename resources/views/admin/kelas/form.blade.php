@extends('layouts.admin')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Kelas</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Nama Kelas <span class="text-danger">*</span></label><input name="nama_kelas" value="{{ old('nama_kelas',$item->nama_kelas) }}" class="form-control" placeholder="1A" required></div>
<div class="mb-3"><label class="form-label fw-medium">Tingkat <span class="text-danger">*</span></label><input name="tingkat" value="{{ old('tingkat',$item->tingkat) }}" class="form-control" placeholder="1" required></div>
<div class="mb-3"><label class="form-label fw-medium">Rombel <span class="text-danger">*</span></label><input name="rombel" value="{{ old('rombel',$item->rombel) }}" class="form-control" placeholder="A" required></div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-warning text-white"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('admin.kelas.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
