@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Data Guru</h4><a href="{{ route('admin.guru.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<table class="table table-bordered bg-white">
<thead><tr><th>NIP</th><th>Nama</th><th>Email</th><th>HP</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->nip }}</td><td>{{ $r->nama_lengkap }}</td><td>{{ $r->email }}</td><td>{{ $r->no_hp }}</td>
<td><a href="{{ route('admin.guru.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('admin.guru.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="5" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
