@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Data Siswa</h4>
<a href="{{ route('admin.siswa.create') }}" class="btn btn-warning text-white btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a>
</div>
<div class="card">
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3 text-nowrap" style="min-width:100px">NIS</th><th class="text-nowrap" style="min-width:180px">Nama Lengkap</th><th class="text-nowrap" style="min-width:80px">Kelas</th><th class="text-nowrap" style="min-width:80px">Rombel</th><th class="text-nowrap" style="min-width:120px">Jenis Kelamin</th><th class="text-end pe-3 text-nowrap" style="min-width:110px">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium">{{ $r->nis }}</td><td class="text-nowrap">{{ $r->nama_lengkap }}</td><td><span class="badge bg-light text-dark border">{{ $r->kelas }}</span></td><td>{{ $r->rombel }}</td><td>{{ $r->jenis_kelamin=='L' ? 'Laki-laki' : 'Perempuan' }}</td>
<td class="text-nowrap"><div class="d-flex gap-1 justify-content-end"><a href="{{ route('admin.siswa.edit',$r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('admin.siswa.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus {{ $r->nama_lengkap }}?')"><i class="bi bi-trash3"></i></button></form></div></td></tr>
@empty<tr><td colspan="6" class="text-center text-muted py-4">Belum ada data siswa</td></tr>@endforelse
</tbody></table>
</div>
</div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
