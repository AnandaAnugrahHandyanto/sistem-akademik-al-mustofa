@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Data Guru</h4><a href="{{ route('admin.guru.create') }}" class="btn btn-warning text-white btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a></div>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3 text-nowrap" style="min-width:120px">NIP</th><th class="text-nowrap" style="min-width:180px">Nama</th><th class="text-nowrap" style="min-width:180px">Email</th><th class="text-nowrap" style="min-width:120px">HP</th><th class="text-end pe-3 text-nowrap" style="min-width:110px">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3">{{ $r->nip }}</td><td class="fw-medium text-nowrap">{{ $r->nama_lengkap }}</td><td class="text-muted small">{{ $r->email ?? '-' }}</td><td>{{ $r->no_hp ?? '-' }}</td>
<td class="text-nowrap"><div class="d-flex gap-1 justify-content-end"><a href="{{ route('admin.guru.edit',$r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('admin.guru.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('hapus?')"><i class="bi bi-trash3"></i></button></form></div></td></tr>
@empty<tr><td colspan="5" class="text-center text-muted py-4">Belum ada data guru</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
