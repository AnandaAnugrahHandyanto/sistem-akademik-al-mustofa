@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Mata Pelajaran</h4><a href="{{ route('admin.mapel.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<table class="table table-bordered bg-white">
<thead><tr><th>Nama</th><th>Guru</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->nama }}</td><td>{{ $r->guru?->nama_lengkap ?? '-' }}</td>
<td><a href="{{ route('admin.mapel.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('admin.mapel.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
