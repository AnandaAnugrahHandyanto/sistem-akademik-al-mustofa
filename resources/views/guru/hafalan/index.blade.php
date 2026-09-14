@extends('layouts.guru')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Hafalan</h4><a href="{{ route('guru.hafalan.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a></div>
<div class="card mb-3"><div class="card-body py-3">
<form method="GET" class="row g-2 align-items-end">
<div class="col-md-4"><label class="form-label small fw-medium">Kelas</label><select name="kelas" class="form-select"><option value="">Semua Kelas</option>@foreach($kelas as $k)<option value="{{ $k }}" @selected(request('kelas')==$k)>{{ $k }}</option>@endforeach</select></div>
<div class="col-md-4"><label class="form-label small fw-medium">Jenis</label><select name="jenis" class="form-select"><option value="">Semua Jenis</option><option value="surat_pendek" @selected(request('jenis')=='surat_pendek')>Surat Pendek</option><option value="doa" @selected(request('jenis')=='doa')>Doa</option><option value="hadis" @selected(request('jenis')=='hadis')>Hadis</option></select></div>
<div class="col-md-4 d-flex gap-2"><button class="btn btn-success"><i class="bi bi-funnel me-1"></i> Filter</button><a href="{{ route('guru.hafalan.index') }}" class="btn btn-light border">Reset</a></div>
</form>
</div></div>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3 text-nowrap" style="min-width:150px">Siswa</th><th class="text-nowrap" style="min-width:100px">Jenis</th><th class="text-nowrap" style="min-width:120px">Surat</th><th style="min-width:140px" class="text-nowrap">Progress</th><th class="text-nowrap" style="min-width:80px">Audio</th><th class="text-nowrap" style="min-width:110px">Tanggal</th><th class="text-end pe-3 text-nowrap" style="min-width:110px">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium text-nowrap">{{ $r->siswa->nama_lengkap }} <small class="text-muted">({{ $r->siswa->kelas }})</small></td><td><span class="badge bg-light text-dark border">{{ $r->jenis_hafalan }}</span></td><td>{{ $r->surat }}</td><td><div class="progress" style="height:20px;"><div class="progress-bar {{ $r->progress <= 50 ? 'bg-danger' : ($r->progress <= 80 ? 'bg-warning text-dark' : 'bg-success') }}" role="progressbar" style="width: {{ $r->progress }}%;" aria-valuenow="{{ $r->progress }}" aria-valuemin="0" aria-valuemax="100">{{ $r->progress }}%</div></div></td><td>@if($r->audio)<a href="{{ Storage::url($r->audio) }}" target="_blank" class="btn btn-sm btn-outline-success"><i class="bi bi-play-circle me-1"></i>Play</a>@else<span class="text-muted">-</span>@endif</td><td class="small text-muted">{{ $r->tanggal }}</td>
<td class="text-nowrap"><div class="d-flex gap-1 justify-content-end"><a href="{{ route('guru.hafalan.edit',$r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('guru.hafalan.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('hapus?')"><i class="bi bi-trash3"></i></button></form></div></td></tr>
@empty<tr><td colspan="7" class="text-center text-muted py-4">Belum ada data hafalan</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
