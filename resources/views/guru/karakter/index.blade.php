@extends('layouts.guru')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Penilaian Karakter <small class="text-muted fw-normal">6 Aspek</small></h4><a href="{{ route('guru.karakter.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a></div>
<div class="card mb-3"><div class="card-body py-3">
<form method="GET" class="row g-2 align-items-end">
<div class="col-md-4"><label class="form-label small fw-medium">Kelas</label><select name="kelas" class="form-select"><option value="">Semua Kelas</option>@foreach($kelas as $k)<option value="{{ $k }}" @selected(request('kelas')==$k)>{{ $k }}</option>@endforeach</select></div>
<div class="col-md-4"><label class="form-label small fw-medium">Aspek</label><select name="aspek" class="form-select"><option value="">Semua Aspek</option>@foreach($aspek as $a)<option value="{{ $a }}" @selected(request('aspek')==$a)>{{ $a }}</option>@endforeach</select></div>
<div class="col-md-4 d-flex gap-2"><button class="btn btn-success"><i class="bi bi-funnel me-1"></i> Filter</button><a href="{{ route('guru.karakter.index') }}" class="btn btn-light border">Reset</a></div>
</form>
</div></div>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3 text-nowrap" style="min-width:150px">Siswa</th><th class="text-nowrap" style="min-width:110px">Aspek</th><th class="text-nowrap" style="min-width:70px">Nilai</th><th class="text-nowrap" style="min-width:110px">Tanggal</th><th class="text-end pe-3 text-nowrap" style="min-width:110px">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium text-nowrap">{{ $r->siswa->nama_lengkap }} <small class="text-muted">({{ $r->siswa->kelas }})</small></td><td><span class="badge bg-light text-dark border">{{ $r->aspek }}</span></td><td><span class="badge bg-{{ $r->nilai=='A'?'success':($r->nilai=='B'?'primary':($r->nilai=='C'?'warning text-dark':'danger')) }}">{{ $r->nilai }}</span></td><td class="small text-muted">{{ $r->tanggal }}</td>
<td class="text-nowrap"><div class="d-flex gap-1 justify-content-end"><a href="{{ route('guru.karakter.edit',$r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('guru.karakter.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('hapus?')"><i class="bi bi-trash3"></i></button></form></div></td></tr>
@empty<tr><td colspan="5" class="text-center text-muted py-4">Belum ada data karakter</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
