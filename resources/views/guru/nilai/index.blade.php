@extends('layouts.guru')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h4 class="fw-semibold mb-0" style="font-family:'Poppins',sans-serif;">Input Nilai</h4>
<a href="{{ route('guru.nilai.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-lg me-1"></i> Tambah</a>
</div>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3">Siswa</th><th>Mata Pelajaran</th><th>Angka</th><th>Huruf</th><th>Semester</th><th class="text-end pe-3">Aksi</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium text-nowrap">{{ $r->siswa->nama_lengkap }}</td><td>{{ $r->mataPelajaran->nama }}</td><td><span class="badge bg-light text-dark border">{{ $r->nilai_angka }}</span></td><td><span class="badge bg-success">{{ $r->nilai_huruf }}</span></td><td><span class="badge bg-light text-dark border">{{ $r->semester }}</span></td>
<td class="text-nowrap"><div class="d-flex gap-1 justify-content-end"><a href="{{ route('guru.nilai.edit',$r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('guru.nilai.destroy',$r) }}" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('hapus?')"><i class="bi bi-trash3"></i></button></form></div></td></tr>
@empty<tr><td colspan="6" class="text-center text-muted py-4">Belum ada data nilai</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
