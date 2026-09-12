@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Mata Pelajaran</h4><a href="{{ route('admin.mapel.create') }}" class="btn btn-warning text-white btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a></div>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3">Nama</th><th>Guru Pengampu</th><th class="text-end pe-3">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium">{{ $r->nama }}</td><td>{{ $r->guru?->nama_lengkap ?? '-' }}</td>
<td class="text-end pe-3"><a href="{{ route('admin.mapel.edit',$r) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a><form method="POST" action="{{ route('admin.mapel.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('hapus?')"><i class="bi bi-trash"></i></button></form></td></tr>
@empty<tr><td colspan="3" class="text-center text-muted py-4">Belum ada data mapel</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
