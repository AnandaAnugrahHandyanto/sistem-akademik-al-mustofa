@extends('layouts.guru')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">{{ $item->exists ? 'Edit' : 'Tambah' }} Hafalan</h4>
<div class="card"><div class="card-body p-4">
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-3"><label class="form-label fw-medium">Siswa <span class="text-danger">*</span></label><select name="siswa_id" class="form-select" required><option value="">- Pilih Siswa -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }} ({{ $s->kelas }})</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label fw-medium">Jenis Hafalan <span class="text-danger">*</span></label><select name="jenis_hafalan" class="form-select" required><option value="surat_pendek" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='surat_pendek')>Surat Pendek</option><option value="doa" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='doa')>Doa</option><option value="hadis" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='hadis')>Hadis</option></select></div>
<div class="mb-3"><label class="form-label fw-medium">Surat / Judul <span class="text-danger">*</span></label><input name="surat" value="{{ old('surat',$item->surat) }}" class="form-control" placeholder="Contoh: An-Nas" required></div>
<div class="mb-3"><label class="form-label fw-medium">Progress (0-100) <span class="text-danger">*</span></label><input name="progress" type="number" min="0" max="100" value="{{ old('progress',$item->progress ?? 0) }}" class="form-control" placeholder="0" required></div>
<div class="mb-3"><label class="form-label fw-medium">Tanggal <span class="text-danger">*</span></label><input name="tanggal" type="date" value="{{ old('tanggal', $item->tanggal ? \Illuminate\Support\Carbon::parse($item->tanggal)->format('Y-m-d') : date('Y-m-d')) }}" class="form-control" required></div>
<div class="mb-3"><label class="form-label fw-medium">Audio (opsional)</label><input name="audio" type="file" class="form-control" accept=".mp3,.wav,.m4a,.ogg"><small class="text-muted">mp3/wav/m4a/ogg max 5MB</small>@if($item->audio)<div class="mt-1"><small class="text-muted">Existing: <a href="{{ Storage::url($item->audio) }}" target="_blank"><i class="bi bi-play-circle"></i> play</a> - upload baru akan replace</small></div>@endif</div>
<div class="d-flex gap-2 mt-4"><button class="btn btn-success"><i class="bi bi-check-lg me-1"></i> Simpan</button><button type="reset" class="btn btn-light border">Reset</button><a href="{{ route('guru.hafalan.index') }}" class="btn btn-outline-secondary ms-auto">Kembali</a></div>
</form>
</div></div>
@endsection
