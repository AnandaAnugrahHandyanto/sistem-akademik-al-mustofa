@extends('layouts.guru')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Hafalan</h4><a href="{{ route('guru.hafalan.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<form method="GET" class="row g-2 mb-3">
<div class="col-auto"><select name="kelas" class="form-select"><option value="">Semua Kelas</option>@foreach($kelas as $k)<option value="{{ $k }}" @selected(request('kelas')==$k)>{{ $k }}</option>@endforeach</select></div>
<div class="col-auto"><select name="jenis" class="form-select"><option value="">Semua Jenis</option><option value="surat_pendek" @selected(request('jenis')=='surat_pendek')>surat_pendek</option><option value="doa" @selected(request('jenis')=='doa')>doa</option><option value="hadis" @selected(request('jenis')=='hadis')>hadis</option></select></div>
<div class="col-auto"><button class="btn btn-secondary">Filter</button> <a href="{{ route('guru.hafalan.index') }}" class="btn btn-light border">Reset</a></div>
</form>
<table class="table table-bordered bg-white">
<thead><tr><th>Siswa</th><th>Jenis</th><th>Surat</th><th>Progress</th><th>Audio</th><th>Tanggal</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->siswa->nama_lengkap }} ({{ $r->siswa->kelas }})</td><td>{{ $r->jenis_hafalan }}</td><td>{{ $r->surat }}</td><td><div class="progress" style="height:16px"><div class="progress-bar" style="width:{{ $r->progress }}%">{{ $r->progress }}%</div></div></td><td>@if($r->audio)<a href="{{ Storage::url($r->audio) }}" target="_blank" class="btn btn-sm btn-outline-primary">Play</a>@else<span class="text-muted">-</span>@endif</td><td>{{ $r->tanggal }}</td>
<td><a href="{{ route('guru.hafalan.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('guru.hafalan.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="7" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
