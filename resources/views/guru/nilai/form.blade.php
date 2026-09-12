@extends('layouts.guru')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Nilai</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Siswa <span class="text-danger">*</span></label><select name="siswa_id" class="form-select" required><option value="">- Pilih Siswa -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }} ({{ $s->kelas }})</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label fw-medium">Mata Pelajaran <span class="text-danger">*</span></label><select name="mata_pelajaran_id" class="form-select" required><option value="">- Pilih Mapel -</option>@foreach($mapels as $m)<option value="{{ $m->id }}" @selected(old('mata_pelajaran_id',$item->mata_pelajaran_id)==$m->id)>{{ $m->nama }}</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label fw-medium">Nilai Angka <span class="text-danger">*</span></label><input name="nilai_angka" type="number" min="0" max="100" value="{{ old('nilai_angka',$item->nilai_angka) }}" class="form-control" placeholder="0 - 100" required></div>
<div class="mb-3"><label class="form-label fw-medium">Semester <span class="text-danger">*</span></label><select name="semester" class="form-select" required><option value="ganjil" @selected(old('semester',$item->semester)=='ganjil')>Ganjil</option><option value="genap" @selected(old('semester',$item->semester)=='genap')>Genap</option></select></div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-success"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('guru.nilai.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
