@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h4>Data Siswa</h4>
<a href="{{ route('admin.siswa.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
</div>
<table class="table table-bordered bg-white">
<thead><tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>Rombel</th><th>JK</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->nis }}</td><td>{{ $r->nama_lengkap }}</td><td>{{ $r->kelas }}</td><td>{{ $r->rombel }}</td><td>{{ $r->jenis_kelamin }}</td>
<td><a href="{{ route('admin.siswa.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('admin.siswa.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="6" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
