@extends('layouts.guru')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Penilaian Karakter (6 Aspek)</h4><a href="{{ route('guru.karakter.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<form method="GET" class="row g-2 mb-3">
<div class="col-auto"><select name="kelas" class="form-select"><option value="">Semua Kelas</option>@foreach($kelas as $k)<option value="{{ $k }}" @selected(request('kelas')==$k)>{{ $k }}</option>@endforeach</select></div>
<div class="col-auto"><select name="aspek" class="form-select"><option value="">Semua Aspek</option>@foreach($aspek as $a)<option value="{{ $a }}" @selected(request('aspek')==$a)>{{ $a }}</option>@endforeach</select></div>
<div class="col-auto"><button class="btn btn-secondary">Filter</button> <a href="{{ route('guru.karakter.index') }}" class="btn btn-light border">Reset</a></div>
</form>
<table class="table table-bordered bg-white">
<thead><tr><th>Siswa</th><th>Aspek</th><th>Nilai</th><th>Tanggal</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->siswa->nama_lengkap }} ({{ $r->siswa->kelas }})</td><td>{{ $r->aspek }}</td><td><span class="badge bg-{{ $r->nilai=='A'?'success':($r->nilai=='B'?'primary':($r->nilai=='C'?'warning':'danger')) }}">{{ $r->nilai }}</span></td><td>{{ $r->tanggal }}</td>
<td><a href="{{ route('guru.karakter.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('guru.karakter.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="5" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
