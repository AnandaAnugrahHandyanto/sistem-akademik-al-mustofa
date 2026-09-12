@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between mb-3"><h4>Data User</h4><a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">+ Tambah</a></div>
<table class="table table-bordered bg-white">
<thead><tr><th>Username</th><th>Name</th><th>Role</th><th>Email</th><th>Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td>{{ $r->username }}</td><td>{{ $r->name }}</td><td><span class="badge bg-primary">{{ $r->role }}</span></td><td>{{ $r->email }}</td>
<td><a href="{{ route('admin.user.edit',$r) }}" class="btn btn-sm btn-warning">Edit</a>
<form method="POST" action="{{ route('admin.user.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('hapus?')">Hapus</button></form></td></tr>
@empty<tr><td colspan="5" class="text-center text-muted">Belum ada data</td></tr>@endforelse
</tbody></table>
{{ $data->links() }}
@endsection
