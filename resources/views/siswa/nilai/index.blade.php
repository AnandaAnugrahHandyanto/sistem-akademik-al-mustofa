@extends('layouts.siswa')
@section('content')
<h4 class="fw-semibold mb-3" style="font-family:'Poppins',sans-serif;">Nilai Saya</h4>
<div class="card"><div class="card-body p-0"><div class="table-responsive">
<table class="table table-hover align-middle mb-0">
<thead><tr><th class="ps-3">Mata Pelajaran</th><th>Angka</th><th>Huruf</th><th>Semester</th></tr></thead>
<tbody>
@forelse($data as $r)
<tr><td class="ps-3 fw-medium text-nowrap">{{ $r->mataPelajaran->nama }}</td><td><span class="badge bg-light text-dark border">{{ $r->nilai_angka }}</span></td><td><span class="badge bg-purple" style="background:#7c3aed;">{{ $r->nilai_huruf }}</span></td><td class="small text-muted">{{ $r->semester }}</td></tr>
@empty<tr><td colspan="4" class="text-center text-muted py-4">Belum ada data nilai</td></tr>@endforelse
</tbody></table>
</div></div>
@if($data->hasPages())<div class="card-footer bg-white d-flex justify-content-center">{{ $data->links() }}</div>@endif
</div>
@endsection
