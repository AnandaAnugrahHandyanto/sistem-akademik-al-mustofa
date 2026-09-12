@extends('layouts.guru')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Tambah' }} Hafalan</h4>
<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="bg-white p-3 rounded border">
@csrf @if($method!=='POST') @method($method) @endif
<div class="mb-2"><label>Siswa</label><select name="siswa_id" class="form-select" required><option value="">- Pilih -</option>@foreach($siswas as $s)<option value="{{ $s->id }}" @selected(old('siswa_id',$item->siswa_id)==$s->id)>{{ $s->nama_lengkap }} ({{ $s->kelas }})</option>@endforeach</select></div>
<div class="mb-2"><label>Jenis</label><select name="jenis_hafalan" class="form-select" required><option value="surat_pendek" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='surat_pendek')>surat_pendek</option><option value="doa" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='doa')>doa</option><option value="hadis" @selected(old('jenis_hafalan',$item->jenis_hafalan)=='hadis')>hadis</option></select></div>
<div class="mb-2"><label>Surat</label><input name="surat" value="{{ old('surat',$item->surat) }}" class="form-control" required></div>
<div class="mb-2"><label>Progress (0-100)</label><input name="progress" type="number" min="0" max="100" value="{{ old('progress',$item->progress ?? 0) }}" class="form-control" required></div>
<div class="mb-2"><label>Tanggal</label><input name="tanggal" type="date" value="{{ old('tanggal', $item->tanggal ? \Illuminate\Support\Carbon::parse($item->tanggal)->format('Y-m-d') : date('Y-m-d')) }}" class="form-control" required></div>
<div class="mb-2"><label>Audio (opsional, mp3/wav/m4a/ogg max 5MB)</label><input name="audio" type="file" class="form-control">@if($item->audio)<small class="text-muted">Existing: <a href="{{ Storage::url($item->audio) }}" target="_blank">play</a> - upload baru akan replace</small>@endif</div>
<button class="btn btn-primary mt-3">Simpan</button>
<a href="{{ route('guru.hafalan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
