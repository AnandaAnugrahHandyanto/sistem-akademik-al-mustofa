@extends('layouts.admin')
@section('title','Laporan - SDIT Al-Mustofa')
@section('content')
<h4 class="fw-bold mb-3"><i class="bi bi-file-earmark-text"></i> Laporan</h4>

<div class="card mb-3">
<div class="card-body">
<form method="GET" action="{{ route('admin.laporan.index') }}">
<div class="row g-2 align-items-end">
<div class="col-md-2">
<label class="form-label small">Jenis Laporan</label>
<select name="jenis" class="form-select">
<option value="nilai" {{ $jenis==='nilai' ? 'selected' : '' }}>Nilai</option>
<option value="hafalan" {{ $jenis==='hafalan' ? 'selected' : '' }}>Hafalan</option>
<option value="karakter" {{ $jenis==='karakter' ? 'selected' : '' }}>Karakter</option>
</select>
</div>
<div class="col-md-2">
<label class="form-label small">Kelas</label>
<select name="kelas" class="form-select">
<option value="">Semua Kelas</option>
@foreach($kelas as $k)
<option value="{{ $k->nama_kelas }}" {{ $filterKelas==$k->nama_kelas ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
@endforeach
</select>
</div>
<div class="col-md-3">
<label class="form-label small">Mapel (khusus Nilai)</label>
<select name="mapel" class="form-select">
<option value="">Semua Mapel</option>
@foreach($mapel as $m)
<option value="{{ $m->id }}" {{ $filterMapel==$m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
@endforeach
</select>
</div>
<div class="col-md-2">
<label class="form-label small">Semester</label>
<select name="semester" class="form-select">
<option value="">Semua</option>
<option value="ganjil" {{ $filterSemester==='ganjil' ? 'selected' : '' }}>Ganjil</option>
<option value="genap" {{ $filterSemester==='genap' ? 'selected' : '' }}>Genap</option>
</select>
</div>
<div class="col-md-3 d-flex gap-2">
<button type="submit" name="preview" value="1" class="btn btn-primary"><i class="bi bi-eye"></i> Preview</button>
<button type="submit" name="cetak" value="1" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</button>
</div>
</div>
</form>
</div>
</div>

@if($preview)
<div class="card">
<div class="card-header fw-semibold">Preview: {{ ucfirst($jenis) }} @if($filterKelas) — Kelas {{ $filterKelas }} @endif</div>
<div class="card-body p-0">
<div class="table-responsive">
@if($jenis==='nilai')
<table class="table table-hover mb-0">
<thead><tr><th class="text-nowrap">NIS</th><th class="text-nowrap">Nama</th><th class="text-nowrap">Kelas</th><th class="text-nowrap">Mapel</th><th class="text-nowrap">Nilai</th><th class="text-nowrap">Semester</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="text-nowrap">{{ $r->siswa->nis ?? '-' }}</td><td class="text-nowrap">{{ $r->siswa->nama_lengkap ?? '-' }}</td><td>{{ $r->siswa->kelas ?? '-' }}</td><td class="text-nowrap">{{ $r->mataPelajaran->nama ?? '-' }}</td><td>{{ $r->nilai_angka }} ({{ $r->nilai_huruf }})</td><td>{{ $r->semester }}</td></tr>
@empty
<tr><td colspan="6" class="text-center text-muted py-3">Tidak ada data</td></tr>
@endforelse
</tbody>
</table>
@elseif($jenis==='hafalan')
<table class="table table-hover mb-0">
<thead><tr><th class="text-nowrap">NIS</th><th class="text-nowrap">Nama</th><th>Surat</th><th>Progress</th><th>Tanggal</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="text-nowrap">{{ $r->siswa->nis ?? '-' }}</td><td class="text-nowrap">{{ $r->siswa->nama_lengkap ?? '-' }}</td><td>{{ $r->surat ?? $r->jenis_hafalan }}</td><td>{{ $r->progress }}%</td><td>{{ $r->tanggal }}</td></tr>
@empty
<tr><td colspan="5" class="text-center text-muted py-3">Tidak ada data</td></tr>
@endforelse
</tbody>
</table>
@else
<table class="table table-hover mb-0">
<thead><tr><th class="text-nowrap">NIS</th><th class="text-nowrap">Nama</th><th>Aspek</th><th>Nilai</th><th>Tanggal</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="text-nowrap">{{ $r->siswa->nis ?? '-' }}</td><td class="text-nowrap">{{ $r->siswa->nama_lengkap ?? '-' }}</td><td>{{ $r->aspek }}</td><td>{{ $r->nilai }}</td><td>{{ $r->tanggal }}</td></tr>
@empty
<tr><td colspan="5" class="text-center text-muted py-3">Tidak ada data</td></tr>
@endforelse
</tbody>
</table>
@endif
</div>
</div>
</div>
@endif
@endsection
