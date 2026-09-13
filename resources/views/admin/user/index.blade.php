@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Data User</h4><a href="{{ route('admin.user.create') }}" class="btn btn-warning text-white btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a></div>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3">Username</th><th>Name</th><th>Role</th><th>Email</th><th class="text-end pe-3">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium text-nowrap">{{ $r->username }}</td><td class="text-nowrap">{{ $r->name }}</td><td><span class="badge bg-warning text-dark">{{ $r->role }}</span></td><td class="small text-muted">{{ $r->email }}</td>
<td class="text-nowrap"><div class="d-flex gap-1 justify-content-end"><a href="{{ route('admin.user.edit',$r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('admin.user.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('hapus?')"><i class="bi bi-trash3"></i></button></form></div></td></tr>
@empty<tr><td colspan="5" class="text-center text-muted py-4">Belum ada data user</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
