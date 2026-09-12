@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Data Kelas</h4><a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<table class="table table-bordered bg-white">
<thead><tr><th>Nama Kelas</th><th>Tingkat</th><th>Rombel</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->nama_kelas }}</td><td>{{ $r->tingkat }}</td><td>{{ $r->rombel }}</td>
<td><a href="{{ route('admin.kelas.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('admin.kelas.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
