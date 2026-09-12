@extends('layouts.guru')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Input Nilai</h4><a href="{{ route('guru.nilai.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<table class="table table-bordered bg-white">
<thead><tr><th>Siswa</th><th>Mapel</th><th>Angka</th><th>Huruf</th><th>Semester</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->siswa->nama_lengkap }}</td><td>{{ $r->mataPelajaran->nama }}</td><td>{{ $r->nilai_angka }}</td><td>{{ $r->nilai_huruf }}</td><td>{{ $r->semester }}</td>
<td><a href="{{ route('guru.nilai.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('guru.nilai.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="6" class="text-center text-muted">Belum ada nilai</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
