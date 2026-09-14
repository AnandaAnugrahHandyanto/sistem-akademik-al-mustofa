@extends('layouts.admin')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Siswa</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">NIS <span class="text-danger">*</span></label><input name="nis" value="{{ old('nis',$item->nis) }}" class="form-control @error('nis') is-invalid @enderror" placeholder="Contoh: 12345" required>@error('nis')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
<div class="mb-3"><label class="form-label fw-medium">Nama Lengkap <span class="text-danger">*</span></label><input name="nama_lengkap" value="{{ old('nama_lengkap',$item->nama_lengkap) }}" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama lengkap siswa" required></div>
<div class="row g-3">
<div class="col-md-4"><label class="form-label fw-medium">Kelas <span class="text-danger">*</span></label><input name="kelas" value="{{ old('kelas',$item->kelas) }}" class="form-control" placeholder="1A" required></div>
<div class="col-md-4"><label class="form-label fw-medium">Rombel <span class="text-danger">*</span></label><input name="rombel" value="{{ old('rombel',$item->rombel) }}" class="form-control" placeholder="A" required></div>
<div class="col-md-4"><label class="form-label fw-medium">Jenis Kelamin <span class="text-danger">*</span></label><select name="jenis_kelamin" class="form-select" required><option value="L" @selected(old('jenis_kelamin',$item->jenis_kelamin)=='L')>Laki-laki</option><option value="P" @selected(old('jenis_kelamin',$item->jenis_kelamin)=='P')>Perempuan</option></select></div>
</div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-warning text-white"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
